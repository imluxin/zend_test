<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Admin;
return array (
		'controllers' => array (
				'invokables' => array (
						'Admin\Controller\Index' => 'Admin\Controller\IndexController',
						'Admin\Controller\Login' => 'Admin\Controller\LoginController',
						'Admin\Controller\Album' => 'Admin\Controller\AlbumController',
						'Admin\Controller\User' => 'Admin\Controller\UserController',
						'Admin\Controller\ActiveClass' => 'Admin\Controller\ActiveClassController',
						'Admin\Controller\Product' => 'Admin\Controller\ProductController',
                        'Admin\Controller\Personal' => 'Admin\Controller\PersonalController',
				)
		),
		'router' => array (
				'routes' => array (
						'admin' => array (
								'type' => 'Zend\Mvc\Router\Http\Literal',
								'options' => array (
										'route' => '/admin',
										'defaults' => array (
												'controller' => 'Admin\Controller\Index',
												'action' => 'index'
										)
								)
						),
						'admin_login' => array (
								'type' => 'Zend\Mvc\Router\Http\Literal',
								'options' => array (
										'route' => '/admin/login',
										'defaults' => array (
												'controller' => 'Admin\Controller\Login',
												'action' => 'index'
										)
								)
						),
						'admin_album' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/admin/album[/][:action][/:id]',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+'
										),
										'defaults' => array (
												'controller' => 'Admin/Controller/Album',
												'action' => 'index'
										)
								)
						),
                        'admin_pesonal' => array (
                            'type' => 'segment',
                            'options' => array (
                                'route' => '/admin/personal[/][:action][/:id]',
                                'constraints' => array (
                                    'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    'id' => '[0-9]+'
                                ),
                                'defaults' => array (
                                    'controller' => 'Admin/Controller/Personal',
                                    'action' => 'personalSettingInformation'
                                )
                            )
                        ),
						'admin_user' => array(
								'type' => 'segment',
								'options' => array(
										'route' => '/admin/user[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Admin/Controller/User',
												'action' => 'index'
										)
								)
						),
						'admin_active_class' => array(
								'type' => 'segment',
								'options' => array(
										'route' => '/admin/activeclass[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Admin/Controller/ActiveClass',
												'action' => 'index'
										)
								)
						),
						'admin_product' => array(
								'type' => 'segment',
								'options' => array(
										'route' => '/admin/product[/][:action][/:id]',
										'constraints' => array(
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+',
										),
										'defaults' => array(
												'controller' => 'Admin/Controller/Product',
												'action' => 'index'
										)
								)
						),
						'application' => array (
								'type' => 'Literal',
								'options' => array (
										'route' => '/admin',
										'defaults' => array (
												'__NAMESPACE__' => 'Application\Controller',
												'controller' => 'Index',
												'action' => 'index'
										)
								),
								'may_terminate' => true,
								'child_routes' => array (
										'default' => array (
												'type' => 'Segment',
												'options' => array (
														'route' => '/[:controller[/:action]]',
														'constraints' => array (
																'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
																'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
														),
														'defaults' => array ()
												)
										)
								)
						)
				)
		),
		'service_manager' => array (
				'abstract_factories' => array (
						'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
						'Zend\Log\LoggerAbstractServiceFactory'
				),
				'aliases' => array (
						'translator' => 'MvcTranslator',
//                         'Zend\Authentication\AuthenticationService' => 'Admin_AuthService',
				),
		),
		'view_manager' => array (
				'display_not_found_reason' => true,
				'display_exceptions' => true,
				'doctype' => 'HTML5',
				'not_found_template' => 'error/404',
				'exception_template' => 'error/index',
				'template_map' => array (
						'admin/layout' => __DIR__ . '/../view/layout/layout.phtml',
            			'admin/index/index' => __DIR__ . '/../view/admin/index/index.phtml',
						'error/404' => __DIR__ . '/../view/error/404.phtml',
						'error/index' => __DIR__ . '/../view/error/index.phtml',
						'pagination/search' => __DIR__ . '/../view/pagination/search.phtml'
				),
				'template_path_stack' => array (
						__DIR__ . '/../view'
				)
		),
		// Placeholder for console routes
		'console' => array (
				'router' => array (
						'routes' => array ()
				)
		),
    	'doctrine' => array (
    			'driver' => array (
    					__NAMESPACE__ . '_driver' => array (
    							'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
    							'cache' => 'array',
    							'paths' => array (
    									__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
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
