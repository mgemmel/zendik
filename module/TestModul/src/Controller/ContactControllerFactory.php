<?php
/**
 * Created by PhpStorm.
 * User: majo
 * Date: 6.12.2018
 * Time: 10:58
 */

namespace TestModul\Controller;

use Interop\Container\ContainerInterface;
use TestModul\Controller\ContactController;
use TestModul\Form\ContactForm;
use TestModul\Service\CurrencyConverter;
use Zend\ServiceManager\Factory\FactoryInterface;

class ContactControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {

        $service = $container->get(CurrencyConverter::class);
        $contactform = $container->get(ContactForm::class);
        return new ContactController($service, $contactform);
    }



}