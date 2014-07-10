<?php

// require_once __DIR__.'/src/User/Module.php';

namespace User;

use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
use ZfcUser\Controller\RedirectCallback;

class Module
{
    public function init(ModuleManager $mm)
    {
        $mm->getEventManager()->getSharedManager()->attach(__NAMESPACE__, 'dispatch', function($e){
        	$e->getTarget()->layout('home/layout');
        });
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'zfcuser_user_service'              => 'User\Service\User',
            ),
            'factories' => array(
                'zfcuser_login_form' => function ($sm) {
                    $options = $sm->get('zfcuser_module_options');
                    $form = new Form\Login(null, $options);
                    $form->setInputFilter(new Form\LoginFilter($options));
                    return $form;
                },

                'zfcuser_register_form' => function ($sm) {
                    $options = $sm->get('zfcuser_module_options');
                    $form = new Form\Register(null, $options);
                    //$form->setCaptchaElement($sm->get('zfcuser_captcha_element'));
                    $form->setInputFilter(new Form\RegisterFilter(
                            new Validator\NoRecordExists(array(
                                    'mapper' => $sm->get('zfcuser_user_mapper'),
                                    'key'    => 'email'
                            )),
                            new Validator\NoRecordExists(array(
                                    'mapper' => $sm->get('zfcuser_user_mapper'),
                                    'key'    => 'username'
                            )),
                            $options
                    ));
                    return $form;
                },

                'zfcuser_change_password_form' => function ($sm) {
                    $options = $sm->get('zfcuser_module_options');
                    $form = new Form\ChangePassword(null, $sm->get('zfcuser_module_options'));
                    $form->setInputFilter(new Form\ChangePasswordFilter($options));
                    return $form;
                },
            ),
        );
    }
   
}
