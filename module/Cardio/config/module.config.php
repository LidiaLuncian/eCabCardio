<?php
namespace Cardio;

use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\CardioController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'cardio' => __DIR__ . '/../view',
        ],
    ],
];