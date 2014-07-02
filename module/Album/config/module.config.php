<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Album\Controller\Album' => 'Album\Controller\AlbumController',
         ),
     ),
     'router' => array(
         'routes' => array(
            'haha' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/home/haha',
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'album' => __DIR__ . '/../view',
         ),
     ),
 );