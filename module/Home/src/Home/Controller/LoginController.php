<?php

namespace Home\Controller;

use Zend\View\Model\ViewModel;
use Home\Form\RegisterForm;
use Home\Form\LoginForm;
use Home\Filter\RegisterFilter;
use Home\Filter\LoginFilter;

/**
 * LoginController
 *
 * @author
 *
 *
 * @version
 *
 *
 */

class LoginController extends BaseController 
{    
    public function loginAction() 
    {
        $form = new LoginForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->getPost();
            $inputFilter = new LoginFilter();
            
            $form->setInputFilter($inputFilter);
            $form->setData($post);
            
            if (!$form->isValid()) {
            	$viewModel = new ViewModel(array('error'=>true, 'form'=>$form));
            	$viewModel->setTemplate('home/login/login');
            	return $viewModel;
            }
            
            $authService = $this->_get_auth_service();
            $adapter = $authService->getAdapter();
            $adapter->setIdentityValue($post['member_name']);
            $adapter->setCredentialValue(md5($post['member_pwd']));
            $authResult = $authService->authenticate();
            
            if ($authResult->isValid()) {
                
                // 写入session
                $identity = $authResult->getIdentity();
                $authService->getStorage()->write($identity);
                $time = 1209600; // 14 days 1209600/3600 = 336 hours => 336/24 = 14 days
                if ($post['rememberme']) {
                    $sessionManager = new \Zend\Session\SessionManager();
                    $sessionManager->rememberMe($time);
                }
                
            	return $this->redirect()->toRoute('home');
            }
            //return $this->redirect()->toRoute('register_confirm');
        }
        return array('form'=>$form);
    }
    
    public function logoutAction()
    {
        $authService = $this->_get_auth_service();
		
		if ($authService->hasIdentity()) {
			// Identity exists; get it
			$identity = $authService->getIdentity();
		}
		
        $authService->clearIdentity();
        $sessionManager = new \Zend\Session\SessionManager();
        $sessionManager->forgetMe();
        
        return $this->redirect()->toRoute('home');
    }
    
    public function registerAction() 
    {
        $form = new RegisterForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->getPost();
            $inputFilter = new RegisterFilter();
            
            $form->setInputFilter($inputFilter);
            $form->setData($post);
            
            if (!$form->isValid()) {
            	$viewModel = new ViewModel(array('error'=>true, 'form'=>$form));
            	$viewModel->setTemplate('home/login/register');
            	return $viewModel;
            }
            
            //$this->get
            
            return $this->redirect()->toRoute('register_confirm');
        }
        return array('form'=>$form);
    }

    public function registerProcessAction()
    {
    }
    
    public function confirmAction()
    {
        return array();
    }
}