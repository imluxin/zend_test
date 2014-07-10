<?php
use Zend\Cache\StorageFactory;
 
return array(
    'service_manager' => array(
        'factories' => array(
            'cache' => function () {
                return StorageFactory::factory(
                    array(
                        'adapter' => array(
                            'name' => 'apc',
                            'options' => array(
                                'ttl' => 3600
                            ),
                        ),
                        'exception_handler' => array('throw_exceptions' => false),
                    )
                );
            }
        ),
    )
);