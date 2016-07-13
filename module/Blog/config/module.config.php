<?php
/**
 * 
 * @author SopheakChhin
 * @date Jul 13, 2016
 * @time 3:52:48 PM
 */

namespace Blog;

use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'service_manager' => [
        'aliases' => [
            Model\PostRepositoryInterface::class => Model\PostRepository::class,
        ],
        'factories' => [
            Model\PostRepository::class => InvokableFactory::class,
        ],
    ],
    //configure for controller
    'controllers' => [
        'factories' => [
            Controller\ListController::class => Factory\ListControllerFactory::class,
            //Controller\ListController::class => InvokableFactory::class
        ]
    ],
    // This lines opens the configuration for the RouteManager
    'router' => [
        // Open configuration for all possible routes
        'routes' => [
            // Define a new route called "blog"
            'blog' => [
                // Define a "literal" route type:
                'type' => Literal::class,
                // Configure the route itself
                'options' => [
                    // Listen to "/blog" as uri:
                    'route' => '/blog',
                    // Define default controller and action to be called when
                    // this route is matched
                    'defaults' => [
                        'controller' => Controller\ListController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    //View Manager
    'view_manager' => [
        'template_path_stack' => [
            __DIR__.'/../view'
        ],
    ],
];