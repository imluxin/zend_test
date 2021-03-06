<?php
namespace User;
use User\Controller\UserController;
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'zfcuser' => __DIR__ . '/../view',
        ),
    ),
    'controllers' => array(
// 		'invokables' => array (
// 				'User\Controller\Index' => 'User\Controller\IndexController',
// 				'User\Controller\Login' => 'User\Controller\LoginController',
// 				'User\Controller\Album' => 'User\Controller\AlbumController',
// 				'User\Controller\User' => 'User\Controller\UserController'
// 		),
        'factories' => array(
            'zfcuser' => function($controllerManager) {
                /* @var ControllerManager $controllerManager*/
                $serviceManager = $controllerManager->getServiceLocator();

                /* @var RedirectCallback $redirectCallback */
                $redirectCallback = $serviceManager->get('zfcuser_redirect_callback');

                /* @var UserController $controller */
                $controller = new UserController($redirectCallback);

                return $controller;
            },
        ),
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
    'zfcuser' => array(
        // telling ZfcUser to use our own class
        'user_entity_class'       => 'User\Entity\User',
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
        'enable_username' => true,
        'use_registration_form_captcha'        => true,
        'auth_identity_fields' => array( 'username' ),
    ),
 
    'bjyauthorize' => array(
        // Using the authentication identity provider, which basically reads the roles from the auth service's identity
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
 
        'role_providers'        => array(
            // using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entity_manager.orm_default',
                'role_entity_class' => 'User\Entity\Role',
            ),
        ),
    ),
    'translator' => array(
        'locale' => 'zh',
        'translation_file_patterns' => array(
            // zend form 验证消息
            array(
                'type'        => 'phparray',
                'base_dir'    => __DIR__ . '/../../../vendor/zendframework/zendframework/resources/languages/',
                'pattern'     => '/%s/Zend_Validate.php',
            ),
            array(
                'type'        => 'phparray',
                'base_dir'    => __DIR__ . '/../../../vendor/zendframework/zendframework/resources/languages/',
                'pattern'     => '/%s/Zend_Captcha.php',
            ),
            // zfcuser 验证消息
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        )
    ),
    'router' => array(
        'routes' => array(
            'admin_login' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/admin/login',
                    'defaults' => array(
                        'controller' => 'zfcuser',
                        'action'     => 'adminlogin',
                    ),
                ),
            ),
            'zfcuser' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/home/user',
                    'defaults' => array(
                        'controller' => 'zfcuser',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'login' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/login',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action'     => 'login',
                            ),
                        ),
                    ),
                    'authenticate' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/authenticate',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action'     => 'authenticate',
                            ),
                        ),
                    ),
                    'logout' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/logout',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action'     => 'logout',
                            ),
                        ),
                    ),
                    'register' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/register',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action'     => 'register',
                            ),
                        ),
                    ),
                    'changepassword' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/change-password',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action'     => 'changepassword',
                            ),
                        ),
                    ),
                    'editprofile' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/edit-profile',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action'     => 'editprofile',
                            ),
                        ),
                    ),
                    'changeemail' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/change-email',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action' => 'changeemail',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);