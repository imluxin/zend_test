<?php

namespace User\Controller;

use Zend\Form\Form;
use Zend\Stdlib\ResponseInterface as Response;
use Zend\Stdlib\Parameters;
use Zend\View\Model\ViewModel;
use ZfcUser\Service\User as UserService;
use ZfcUser\Options\UserControllerOptionsInterface;
use Admin\Entity\ShopncCustomer;
use Admin\Form\CustomerForm;
use User\Filter\ShopncCustomerFilter;
use User\Form\ProfileForm;
use DoctrineORMModule\Form\Element\DoctrineEntity;
use User\Filter\ProfileFilter;

class UserController extends BaseController
{
    const ROUTE_CHANGEPASSWD = 'zfcuser/changepassword';
    const ROUTE_LOGIN        = 'zfcuser/login';
    const ROUTE_REGISTER     = 'zfcuser/register';
    const ROUTE_CHANGEEMAIL  = 'zfcuser/changeemail';

    const CONTROLLER_NAME    = 'zfcuser';

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var Form
     */
    protected $loginForm;

    /**
     * @var Form
     */
    protected $registerForm;

    /**
     * @var Form
     */
    protected $changePasswordForm;

    /**
     * @var Form
     */
    protected $changeEmailForm;

    /**
     * @todo Make this dynamic / translation-friendly
     * @var string
     */
    protected $failedLoginMessage = 'Authentication failed. Please try again.';

    /**
     * @var UserControllerOptionsInterface
     */
    protected $options;

    /**
     * @var callable $redirectCallback
     */
    protected $redirectCallback;

    /**
     * @param callable $redirectCallback
     */
    public function __construct($redirectCallback)
    {
        if (!is_callable($redirectCallback)) {
            throw new \InvalidArgumentException('You must supply a callable redirectCallback');
        }
        $this->redirectCallback = $redirectCallback;
    }

    /**
     * User page
     */
    public function indexAction()
    {            	
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute(static::ROUTE_LOGIN);
        }
        return new ViewModel();
    }
    
    /**
     * Login form
     */
    public function loginAction()
    {
        if ($this->zfcUserAuthentication()->hasIdentity()) {

            $type = $this->zfcUserAuthentication()->getIdentity()->getType();
            if ($type != '1') {
                $this->zfcUserAuthentication()->getAuthAdapter()->resetAdapters();
                $this->zfcUserAuthentication()->getAuthAdapter()->logoutAdapters();
                $this->zfcUserAuthentication()->getAuthService()->clearIdentity();
            }else{
                return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
            }
        }
        
        $request = $this->getRequest();
        $form    = $this->getLoginForm();
        
        if ($this->getOptions()->getUseRedirectParameterIfPresent() && $request->getQuery()->get('redirect')) {
            $redirect = $request->getQuery()->get('redirect');
        } else {
            $redirect = false;
        }
        
        if (!$request->isPost()) {
            return array(
                    'loginForm' => $form,
                    'redirect'  => $redirect,
                    'enableRegistration' => $this->getOptions()->getEnableRegistration(),
            );
        }
        
        $form->setData($request->getPost());
        
        if (!$form->isValid()) {
            $this->flashMessenger()->setNamespace('zfcuser-login-form')->addMessage($this->failedLoginMessage);
            return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_LOGIN).($redirect ? '?redirect='. rawurlencode($redirect) : ''));
        }
        
        // clear adapters
        $this->zfcUserAuthentication()->getAuthAdapter()->resetAdapters();
        $this->zfcUserAuthentication()->getAuthService()->clearIdentity();

        return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate', 'm'=>'home'));
    }
    
    /**
     * Login form
     */
    public function adminloginAction()
    {
        if ($this->zfcUserAuthentication()->hasIdentity()) {
                   
            $type = $this->zfcUserAuthentication()->getIdentity()->getType();
            if ($type != '2') {
                $this->zfcUserAuthentication()->getAuthAdapter()->resetAdapters();
                $this->zfcUserAuthentication()->getAuthAdapter()->logoutAdapters();
                $this->zfcUserAuthentication()->getAuthService()->clearIdentity();
            }else{
                return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
            }
        }
        
        $request = $this->getRequest();
        $form    = $this->getLoginForm();
        
        if ($this->getOptions()->getUseRedirectParameterIfPresent() && $request->getQuery()->get('redirect')) {
            $redirect = $request->getQuery()->get('redirect');
        } else {
            $redirect = false;
        }
        
        if (!$request->isPost()) {
            return array(
                    'loginForm' => $form,
                    'redirect'  => $redirect,
                    'enableRegistration' => $this->getOptions()->getEnableRegistration(),
            );
        }
        
        $form->setData($request->getPost());
        
        if (!$form->isValid()) {
            $this->flashMessenger()->setNamespace('zfcuser-login-form')->addMessage($this->failedLoginMessage);
            return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_LOGIN).($redirect ? '?redirect='. rawurlencode($redirect) : ''));
        }
        
        // clear adapters
        $this->zfcUserAuthentication()->getAuthAdapter()->resetAdapters();
        $this->zfcUserAuthentication()->getAuthService()->clearIdentity();

        return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate', 'm'=>'admin'));
    }

    /**
     * Logout and clear the identity
     */
    public function logoutAction()
    {
        $this->zfcUserAuthentication()->getAuthAdapter()->resetAdapters();
        $this->zfcUserAuthentication()->getAuthAdapter()->logoutAdapters();
        $this->zfcUserAuthentication()->getAuthService()->clearIdentity();

        $redirect = $this->redirectCallback;

        return $redirect();
    }

    /**
     * General-purpose authentication action
     */
    public function authenticateAction()
    {
        if ($this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $adapter = $this->zfcUserAuthentication()->getAuthAdapter();
        $redirect = $this->params()->fromPost('redirect', $this->params()->fromQuery('redirect', false));

        $result = $adapter->prepareForAuthentication($this->getRequest());

        // Return early if an adapter returned a response
        if ($result instanceof Response) {
            return $result;
        }

        $auth = $this->zfcUserAuthentication()->getAuthService()->authenticate($adapter);

        if (!$auth->isValid()) {
            $this->flashMessenger()->setNamespace('zfcuser-login-form')->addMessage($this->failedLoginMessage);
            $adapter->resetAdapters();
            return $this->redirect()->toUrl(
                $this->url()->fromRoute(static::ROUTE_LOGIN) .
                ($redirect ? '?redirect='. rawurlencode($redirect) : '')
            );
        }
        
        // 更新customer表信息
        $user = $this->zfcUserAuthentication()->getIdentity();
        if ($user->getType() == '2') {
            $user_id = $user->getId();
            $customer = $this->getEntityManager()->getRepository('Admin\Entity\ShopncCustomer')->findOneBy(array('userId'=>$user_id));
            $login_num = $customer->getMemberLoginNum();
            $new_login_num = (int)$login_num+1;
            $customer->setMemberLoginNum($new_login_num)
                     ->setMemberLastLogin(time());
            $this->getEntityManager()->persist($customer);
            $this->getEntityManager()->flush();
        }
        
        $redirect = $this->redirectCallback;

        return $redirect();
    }

    /**
     * Register new user
     */
    public function registerAction()
    {        
        // if the user is logged in, we don't need to register
        if ($this->zfcUserAuthentication()->hasIdentity()) {
            // redirect to the login redirect route
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }
        
        // if registration is disabled
        if (!$this->getOptions()->getEnableRegistration()) {
            return array('enableRegistration' => false);
        }

        $request = $this->getRequest();
        $service = $this->getUserService();
        $form = $this->getRegisterForm();
        
        if ($this->getOptions()->getUseRedirectParameterIfPresent() && $request->getQuery()->get('redirect')) {
            $redirect = $request->getQuery()->get('redirect');
        } else {
            $redirect = false;
        }

        $redirectUrl = $this->url()->fromRoute(static::ROUTE_REGISTER)
            . ($redirect ? '?redirect=' . rawurlencode($redirect) : '');
        $prg = $this->prg($redirectUrl, true);

        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return array(
                'registerForm' => $form,
                'enableRegistration' => $this->getOptions()->getEnableRegistration(),
                'redirect' => $redirect,
            );
        }
        
        if (empty($prg['memberTelphone']) && empty($prg['memberPhone'])) {
            $form->setData($prg);
            return array(
                'empty_phone_number' => true,
                'registerForm' => $form,
                'enableRegistration' => $this->getOptions()->getEnableRegistration(),
                'redirect' => $redirect,
            );
        }
        
        $post = $prg;
        
        $user = $service->register($post);

        $redirect = isset($prg['redirect']) ? $prg['redirect'] : null;

        if (!$user) {
            return array(
                'registerForm' => $form,
                'enableRegistration' => $this->getOptions()->getEnableRegistration(),
                'redirect' => $redirect,
            );
        }


        // 增加客户信息
        if (!empty($user)){
            try {
                $time = time();
                $customer = new ShopncCustomer();
                $customer->setMemberEmail($post['email'])
                    ->setMemberName($post['username'])
                    ->setRealName($post['realName'])
                    ->setMemberTelphone($post['memberTelphone'])
                    ->setMemberQq($post['memberQq'])
                    ->setMemberMsn($post['memberMsn'])
                    ->setMemberWebsite($post['memberWebsite'])
                    ->setMemberAddress($post['memberAddress'])
                    ->setUserId($user->getId())
                    ->setMemberTime($time)
                    ->setMemberLoginNum('0')
                ;
                $this->getEntityManager()->persist($customer);
                $this->getEntityManager()->flush();
            } catch (\Exception $e) {
                $saved_user = $this->getEntityManager()->find('User\Entity\User', $user->getId());
                if ($saved_user) {
                    $this->getEntityManager()->remove($saved_user);
                    $this->getEntityManager()->flush();
                }
            }
            
            // 增加客户权限
            if (!empty($user)) {
                $role = $this->getEntityManager()->find('User\Entity\Role', '4');
                $user->addRole($role);
                $this->getEntityManager()->persist($user);
                $this->getEntityManager()->flush();
            }
        }

        if ($service->getOptions()->getLoginAfterRegistration()) {
            $identityFields = $service->getOptions()->getAuthIdentityFields();
            if (in_array('email', $identityFields)) {
                $post['identity'] = $user->getEmail();
            } elseif (in_array('username', $identityFields)) {
                $post['identity'] = $user->getUsername();
            }
            $post['credential'] = $post['password'];
            $request->setPost(new Parameters($post));
            return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate'));
        }

        // TODO: Add the redirect parameter here...
        return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_LOGIN) . ($redirect ? '?redirect='. rawurlencode($redirect) : ''));
    }
    
    public function editprofileAction()
    {
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }
        
        $status = null;
        $user_id = $this->zfcUserAuthentication()->getIdentity()->getId();
        
        $customer = $this->getEntityManager()->getRepository('Admin\Entity\ShopncCustomer')->findOneBy(array('userId'=>$user_id));
        
        $form = new ProfileForm($this->getEntityManager());

        $form->setHydrator(new DoctrineEntity($this->getEntityManager(),'Admin\Entity\ShopncCustomer'));
        $form->bind($customer);
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $inputFilter = new ProfileFilter();
            $form->setInputFilter($inputFilter);
            $form->setData($request->getPost());
        
            if ($form->isValid()) {
                $em = $this->getEntityManager();
        
                $em->persist($customer);
                $em->flush();
        
                $this->flashMessenger()->addSuccessMessage('Post Saved');
        
                return $this->redirect()->toRoute('post');
            }
        }
        
        return new ViewModel(array(
                'post' => $post,
                'form' => $form
        ));
        
        return array('status' => $status);
    }

    /**
     * Change the users password
     */
    public function changepasswordAction()
    {
        // if the user isn't logged in, we can't change password
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            // redirect to the login redirect route
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $form = $this->getChangePasswordForm();
        $prg = $this->prg(static::ROUTE_CHANGEPASSWD);

        $fm = $this->flashMessenger()->setNamespace('change-password')->getMessages();
        if (isset($fm[0])) {
            $status = $fm[0];
        } else {
            $status = null;
        }

        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return array(
                'status' => $status,
                'changePasswordForm' => $form,
            );
        }

        $form->setData($prg);

        if (!$form->isValid()) {
            return array(
                'status' => false,
                'changePasswordForm' => $form,
            );
        }

        if (!$this->getUserService()->changePassword($form->getData())) {
            return array(
                'status' => false,
                'changePasswordForm' => $form,
            );
        }

        $this->flashMessenger()->setNamespace('change-password')->addMessage(true);
        return $this->redirect()->toRoute(static::ROUTE_CHANGEPASSWD);
    }

    public function changeEmailAction()
    {
        // if the user isn't logged in, we can't change email
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            // redirect to the login redirect route
            return $this->redirect()->toRoute($this->getOptions()->getLoginRedirectRoute());
        }

        $form = $this->getChangeEmailForm();
        $request = $this->getRequest();
        $request->getPost()->set('identity', $this->getUserService()->getAuthService()->getIdentity()->getEmail());

        $fm = $this->flashMessenger()->setNamespace('change-email')->getMessages();
        if (isset($fm[0])) {
            $status = $fm[0];
        } else {
            $status = null;
        }

        $prg = $this->prg(static::ROUTE_CHANGEEMAIL);
        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return array(
                'status' => $status,
                'changeEmailForm' => $form,
            );
        }

        $form->setData($prg);

        if (!$form->isValid()) {
            return array(
                'status' => false,
                'changeEmailForm' => $form,
            );
        }

        $change = $this->getUserService()->changeEmail($prg);

        if (!$change) {
            $this->flashMessenger()->setNamespace('change-email')->addMessage(false);
            return array(
                'status' => false,
                'changeEmailForm' => $form,
            );
        }

        $this->flashMessenger()->setNamespace('change-email')->addMessage(true);
        return $this->redirect()->toRoute(static::ROUTE_CHANGEEMAIL);
    }

    /**
     * Getters/setters for DI stuff
     */

    public function getUserService()
    {
        if (!$this->userService) {
            $this->userService = $this->getServiceLocator()->get('zfcuser_user_service');
        }
        return $this->userService;
    }

    public function setUserService(UserService $userService)
    {
        $this->userService = $userService;
        return $this;
    }

    public function getRegisterForm()
    {
        if (!$this->registerForm) {
            $this->setRegisterForm($this->getServiceLocator()->get('zfcuser_register_form'));
        }
        return $this->registerForm;
    }

    public function setRegisterForm(Form $registerForm)
    {
        $this->registerForm = $registerForm;
    }

    public function getLoginForm()
    {
        if (!$this->loginForm) {
            $this->setLoginForm($this->getServiceLocator()->get('zfcuser_login_form'));
        }
        return $this->loginForm;
    }

    public function setLoginForm(Form $loginForm)
    {
        $this->loginForm = $loginForm;
        $fm = $this->flashMessenger()->setNamespace('zfcuser-login-form')->getMessages();
        if (isset($fm[0])) {
            $this->loginForm->setMessages(
                array('identity' => array($fm[0]))
            );
        }
        return $this;
    }

    public function getChangePasswordForm()
    {
        if (!$this->changePasswordForm) {
            $this->setChangePasswordForm($this->getServiceLocator()->get('zfcuser_change_password_form'));
        }
        return $this->changePasswordForm;
    }

    public function setChangePasswordForm(Form $changePasswordForm)
    {
        $this->changePasswordForm = $changePasswordForm;
        return $this;
    }

    /**
     * set options
     *
     * @param UserControllerOptionsInterface $options
     * @return UserController
     */
    public function setOptions(UserControllerOptionsInterface $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * get options
     *
     * @return UserControllerOptionsInterface
     */
    public function getOptions()
    {
        if (!$this->options instanceof UserControllerOptionsInterface) {
            $this->setOptions($this->getServiceLocator()->get('zfcuser_module_options'));
        }
        return $this->options;
    }

    /**
     * Get changeEmailForm.
     *
     * @return changeEmailForm.
     */
    public function getChangeEmailForm()
    {
        if (!$this->changeEmailForm) {
            $this->setChangeEmailForm($this->getServiceLocator()->get('zfcuser_change_email_form'));
        }
        return $this->changeEmailForm;
    }

    /**
     * Set changeEmailForm.
     *
     * @param changeEmailForm the value to set.
     */
    public function setChangeEmailForm($changeEmailForm)
    {
        $this->changeEmailForm = $changeEmailForm;
        return $this;
    }
}
