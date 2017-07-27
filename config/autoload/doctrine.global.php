<?php

use ContainerInteropDoctrine\EntityManagerFactory;
use Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'dependencies' => [
        'factories' => [
            'doctrine.entity_manager.orm_default' => EntityManagerFactory::class,
        ],
    ],

    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'url' => 'mysql://em.api:em.api@localhost/entwicklermagazin.api',
                ],
            ],
        ],
        'driver' => [
            'orm_default' => [
                'class' => MappingDriverChain::class,
                'drivers' => [
                    'Customer\Entity' => 'customer_entity',
                ],
            ],
            'customer_entity' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => APPLICATION_PATH . '/module/Customer/src/Entity',
            ],
        ],
    ],
];
