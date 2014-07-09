<?php
/**
 * Created by PhpStorm.
 * User: chijing
 * Date: 14-7-8
 * Time: 下午2:00
 */

namespace Admin\Navigation;

use Zend\Navigation\Service\AbstractNavigationFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class TopNavigationFactory extends AbstractNavigationFactory
{

    /**
     * @abstract
     * @return string
     */
    protected function getName()
    {
        return 'top_nav';
    }

    protected function getPages(ServiceLocatorInterface $serviceLocator)
    {
        if (null === $this->pages) {
            $application = $serviceLocator->get('Application');
            $routeMatch = $application->getMvcEvent()->getRouteMatch();
            $router = $application->getMvcEvent()->getRouter();
            $pages = $this->getPagesFromConfig($this->topNav());
            $this->pages = $this->injectComponents($pages, $routeMatch, $router);
        }
        return $this->pages;
    }

    public function topNav()
    {
        return array(
            array(
                'label' => '消息',
                'route' => 'admin'
//                'pages' => array(
//                    array(
//                        'label' => '我的消息',
//                        'route' => 'adminHomepage',
//                        'params' => array('action' => 'index'),
//                    ),
//                    array(
//                        'label' => '我的私信',
//                        'route' => 'adminHomepage',
//                        'params' => array('action' => 'letter'),
//                    ),
//                ),
            )
        );
    }

} 