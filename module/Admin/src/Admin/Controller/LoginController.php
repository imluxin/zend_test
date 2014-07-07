<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\LoginFilter;
use Admin\Form\LoginForm;
use Admin\Controller\BaseController;

/**
 * LoginController
 * 
 * @author
 *
 * @version
 *
 */
class LoginController extends BaseController {
	/**
	 * The default action - show the home page
	 */
	public function indexAction() {
	    $this->getAuthService();
	    $this->identity();
		$data = $this->getRequest ();
		$login_form = new LoginForm ();
		if ($data->isPost ()) {
			
			$data = $this->getRequest ()->getPost ();
			
			//验证
			$inputFiler = new LoginFilter ();
			$login_form->setInputFilter ( $inputFiler )->setData ( $data );
			if (! $login_form->isValid()) {
				
				return new ViewModel(array('form'=>$login_form,'error'=>"true"));
			}
			
			//通过验证
			$authService = $this->getAuthService();
			
			$adapter = $authService->getAdapter ();
			$adapter->setIdentityValue ( $data ['worker_name'] );
			$adapter->setCredentialValue ( md5 ( $data ['worker_pwd'] ) );
			$authResult = $authService->authenticate ();
			$is = $authResult->isValid ();
// 			var_dump($adapter);die();
			if ($authResult->isValid ()) {
				// 写入session
				$identity = $authResult->getIdentity ();
				$authService->getStorage ()->write ( $identity );
				return $this->redirect ()->toRoute ( 'admin_album' );
			}
		}
		/* 显示登录页面 */
		
		return array (
				'form' => $login_form 
		);
	}
	/**
	 * 退出登錄
	 * @return Ambigous <\Zend\Http\Response, \Zend\Stdlib\ResponseInterface>
	 */
	public function logoutAction() {
		$authService = $this->getAuthService();
		$authService->clearIdentity ();
		return $this->redirect ()->toRoute ( 'Admin' );
	}
}