<?php
//use Zend\Db\Adapter\AdapterAbstractServiceFactory;
//use Zend\Db\Adapter\AdapterInterface;

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
        'driver' => 'Pdo_mysql',
        'database' => 'zf3_school_system',
        'host'  => 'localhost',
        'username'  => 'root',
        'password'  =>  '',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ],
    /* 'db' => [
        'adapters' => [
            'Application\Db\WriteAdapter' => [
                'driver' => 'Pdo_mysql',
                'database' => 'zf3_school_system',
                'host'  => 'localhost',
                'username'  => 'root',
                'password'  =>  '',
                'driver_options' => array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                ),
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
    ], */
    'php_settings' => array(
        'date.timezone' => 'UTC',
        'memory_limit' => '128M',
        'display_errors' =>'On'
    )
];
