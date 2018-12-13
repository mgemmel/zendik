<?php
/**
 * Created by PhpStorm.
 * User: majo
 * Date: 12.12.2018
 * Time: 16:34
 */

namespace TestModul\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use TestModul\Entity\Book;
use TestModul\Form\BookForm;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class BookController extends AbstractActionController
{
    protected $form;
    protected $book;
    protected $entityManager;

    public function __construct(BookForm $form, Book $book, EntityManager $entityManager)
    {
        $this->form = $form;
        $this->book = $book;
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {

        return new ViewModel();
    }


    public function addAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            $this->form->setData($data);
            if ($this->form->isValid()) {
                $validatedData = $this->form->getData();
                $this->book->setNazov($request->getPost('nazov'));
                $this->book->setAutor($request->getPost('autor'));
                $this->book->setDatum($request->getPost('datum'));
                $this->book->setPopis($request->getPost('popis'));
                $this->book->setCena($request->getPost('cena'));
                $this->book->setKategoria($request->getPost('select'));

                // Add the entity to entity manager.
                $this->entityManager->persist($this->book);

// Apply changes to database.
                try {
                    $this->entityManager->flush();
                } catch (OptimisticLockException $e) {
                }

                echo "validne";
            } else {
                $messages = $this->form->getMessages();
                echo "nevalidne";
            }

        }

        return new ViewModel(['form' => $this->form]);
    }

    public function editAction()
    {
        return new ViewModel(['form' => $this->form]);
    }
}