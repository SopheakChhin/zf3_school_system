<?php
/**
 * 
 * @author SopheakChhin
 * @date Jul 11, 2016
 * @time 11:14:42 AM
 */
namespace Album;

use Zend\Router\Http\Segment;
//use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            //Controller\AlbumController::class => InvokableFactory::class,
            //Controller\PlaylistController::class => InvokableFactory::class,
        ],
    ],

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        		'playlist' => [
        				'type'    => Segment::class,
        				'options' => [
        						'route' => '/playlist[/:action[/:id]]',
        						'constraints' => [
        								'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
        								'id'     => '[0-9]+',
        						],
        						'defaults' => [
        								'controller' => Controller\PlaylistController::class,
        								'action'     => 'index',
        						],
        				],
        		],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];