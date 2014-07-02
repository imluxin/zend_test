<?php

namespace Home\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Home\Form\RegisterForm;
use Home\Form\LoginForm;
use Home\Form\RegisterFilter;
use Home\Form\LoginFilter;

/**
 * LoginController
 *
 * @author
 *
 * @version
 *
 */
class LoginController extends AbstractActionController 
{
    public function infoAction()
    {
        return array();
    }
    
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
            
            return $this->redirect()->toRoute('register_confirm');
        }
        return array('form'=>$form);
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