<?php


namespace TestModul;

use TestModul\Controller\BookController;
use TestModul\Controller\ContactControllerFactory;
use TestModul\Controller\BookControllerFactory;
use TestModul\Controller\ContactController;
use TestModul\Controller\TestModulController;
use TestModul\Form\BookForm;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use TestModul\Service\CurrencyConverter;
use TestModul\Form\ContactForm;


return [
    'controllers' => [
        'factories' => [
            TestModulController::class => InvokableFactory::class,
            ContactController::class => ContactControllerFactory::class,
            BookController::class=>BookControllerFactory::class
        ],
    ],
    'service_manager'=>[
        'factories' => [
            CurrencyConverter::class => InvokableFactory::class,
            Contactform::class=>InvokableFactory::class,
            BookForm::class=>InvokableFactory::class
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
            'book' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/book[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\BookController::class,
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
