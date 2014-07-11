<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\ModuleManager;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    public function init(ModuleManager $mm)
    {
        $mm->getEventManager()->getSharedManager()->attach(__NAMESPACE__, 'dispatch', function ($e) {
            $e->getTarget()->layout('admin/layout');
            $matches = $e->getRouteMatch();
            $controller = $matches->getParam('controller');
            if ($controller == 'Admin/Controller/Coderwork') {
                $e->getTarget()->layout('admin/notleftlayout');
            }
        });
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
//                 'Zend\Authentication\AuthenticationService' => function ($sm){
//                 'Admin_AuthService' => function ($sm){
//                     $service = $sm->get('doctrine.authenticationservice.orm_admin');
// //                     echo 'admin -------------';
// //                     var_dump($service);die();
//                     return $service; 
//                 },
                'top_nav' => 'Admin\Navigation\TopNavigationFactory',
            ),

        );
    }

}
