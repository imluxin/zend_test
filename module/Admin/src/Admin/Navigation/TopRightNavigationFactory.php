<?php
/**
 * Created by PhpStorm.
 * User: chijing
 * Date: 14-7-8
 * Time: 下午2:52
 */
namespace Admin\Navigation;

use Zend\Navigation\Service\AbstractNavigationFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class TopRightNavigationFactory extends AbstractNavigationFactory
{

    /**
     * @abstract
     * @return string
     */
    protected function getName()
    {
        return 'top_right_nav';
    }

    protected function getPages(ServiceLocatorInterface $serviceLocator)
    {
        if (null === $this->pages) {
            $application = $serviceLocator->get('Application');
            $routeMatch = $application->getMvcEvent()->getRouteMatch();
            $router = $application->getMvcEvent()->getRouter();
            $pages = $this->getPagesFromConfig($this->topRightNav());
            $this->pages = $this->injectComponents($pages, $routeMatch, $router);
        }
        return $this->pages;
    }

    public function topRightNav()
    {
        return array(
            array(
                'id'         => 'page_2_and_3',
                'label' => '消息2',
                'route' => 'adminHomepage',
                'pages' => array(
                    array(
                        'label' => '我的消息',
                        'active' => false,
                        'route' => 'admin_album',
                        'params' => array('action' => 'index'),
                    ),
                    array(
                        'label' => '我的私信',
                        'active' => false,
                        'route' => 'admin_album',
                        'params' => array('action' => 'letter'),
                    ),
                ),
            )
        );
    }

}