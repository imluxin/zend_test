<?php
namespace Home;

return array(
    'controllers' => array(
        'invokables' => array(
            'Home\Controller\Index' => 'Home\Controller\IndexController',
            'Home\Controller\Login' => 'Home\Controller\LoginController',
            'Home\Controller\Consultative' => 'Home\Controller\ConsultativeController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Home\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
			'home_consultative' => array (
					'type' => 'Segment',
					'options' => array (
							'route' => '/consultative[/][page/:page]',
							'defaults' => array (
									'controller' => 'Home\Controller\Consultative',
									'action' => 'index',
							        'page' => 1,
							)
					)
			),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'home/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'home/index/index'        => __DIR__ . '/../view/home/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
	'service_manager' => array (
			'abstract_factories' => array (
					'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
					'Zend\Log\LoggerAbstractServiceFactory'
			),
			'aliases' => array (
					'translator' => 'MvcTranslator',
			),
	),
	'doctrine' => array (
			'driver' => array (
					__NAMESPACE__ . '_driver' => array (
							'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
							'cache' => 'array',
							'paths' => array (
									__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
									//__DIR__ . '/../../Admin/src/Admin/Entity'
							)
					),
					'orm_default' => array (
							'drivers' => array (
									__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
							)
					)
			),
	),
);
