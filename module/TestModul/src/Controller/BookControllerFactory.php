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
use TestModul\Entity\Book;
use TestModul\Form\BookForm;
use TestModul\Form\ContactForm;
use TestModul\Service\CurrencyConverter;
use Zend\ServiceManager\Factory\FactoryInterface;

class BookControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $bookForm = $container->get(BookForm::class);
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        //$bookEntity= $container->get(Book::class);
        $bookEntity = new Book();
        return new BookController($bookForm, $bookEntity, $entityManager);
    }


}