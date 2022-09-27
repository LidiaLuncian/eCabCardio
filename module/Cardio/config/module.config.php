<?php
namespace Cardio;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [

//    'controllers' => [
//        'factories' => [
//            Controller\AuthController::class => InvokableFactory::class,
//        ],
//    ],
    'router' => [
        'routes' => [
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/user[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'signup' => [
                'type'    => Literal::class,
                'options' => [
                    'route' => '/signup',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'create',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' =>[
            'user/index' => __DIR__ . '/../view/cardio/user/index.phtml',
            'auth/create' => __DIR__ . '/../view/cardio/auth/create.phtml',

        ],
        'template_path_stack' => [
            'cardio' => __DIR__ . '/../view',
        ],
    ],
];