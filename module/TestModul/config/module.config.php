<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TestModul;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\TestModulController::class => InvokableFactory::class,
            Controller\ContactController::class => InvokableFactory::class,
        ],
    ],
    'service_manager'=>[
        'factories' => [
            Service\CurrencyConverter::class => InvokableFactory::class,
        ]
    ],

    'router' => [
        'routes' => [
            'testmodul' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/test[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\TestModulController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'contact' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/contact[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ContactController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'auto' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/auto[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\TestModulController::class,
                        'action'     => 'indexauto',
                    ],
                ],
            ],
            'about' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route'    => '/about-me',
                    'defaults' => [
                        'controller' => Controller\TestModulController::class,
                        'action'     => 'aboutme',
                    ],
                ],
            ],
        ],

    ],


    'view_manager' => [
        'template_path_stack' => [
            'test-modul' => __DIR__ . '/../view',
        ],
    ],
];
