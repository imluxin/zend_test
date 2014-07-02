<?php

namespace Home\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
        // TODO Auto-generated LoginController::indexAction() default action
        return new ViewModel ();
    }
    
    public function registerAction() 
    {
        return array();
    }
}