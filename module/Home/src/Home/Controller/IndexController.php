<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Home for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Home\Controller;


class IndexController extends BaseController
{
    public function indexAction()
    { 
        if ($this->zfcUserAuthentication()->hasIdentity()) {
            //get the email of the user
            echo $this->zfcUserAuthentication()->getIdentity()->getEmail();
            //get the user_id of the user
            echo $this->zfcUserAuthentication()->getIdentity()->getId();
            //get the username of the user
            echo $this->zfcUserAuthentication()->getIdentity()->getUsername();
            //get the display name of the user
            echo $this->zfcUserAuthentication()->getIdentity()->getDisplayname();
        }
        return array();
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /index/index/foo
        return array();
    }
}
