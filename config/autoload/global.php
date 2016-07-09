<?php
use Zend\Db\Adapter\AdapterAbstractServiceFactory;

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    // ...
    'db' => [
        'adapters' => [
            'Application\Db\WriteAdapter' => [
                'driver' => 'Pdo_mysql',
                'database' => 'zf2_master_db',
                'host'  => 'localhost',
                'username'  => 'root',
                'password'  =>  '',
            ]
        ],
    ],
    'service_manager' => [
        'factories' => [
            'Application\Db\WriteAdapter' => AdapterAbstractServiceFactory::class,
        ],
        'aliases' => [
            'db' => 'Application\Db\WriteAdapter',
        ]
    ],
    /* 'service_manager' => [
        'factories' => [
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
        ]
    ],
    'static_salt' => '1A2B3C4E5FZYX0',
    'php_settings' => [
        'date.timezone' => 'UTC',
        'memory_limit' => '128M',
        'display_errors' =>'On'
    ] */
];
