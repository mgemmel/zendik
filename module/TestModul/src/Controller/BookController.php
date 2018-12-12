<?php
/**
 * Created by PhpStorm.
 * User: majo
 * Date: 12.12.2018
 * Time: 16:34
 */

namespace TestModul\Controller;

use TestModul\Form\BookForm;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class BookController extends AbstractActionController
{
    protected $form;
    public function __construct(BookForm $form)
    {
        $this->form=$form;

    }

    public function indexAction()
    {

        return new ViewModel();
    }



    public function addAction()
    {
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $this->form->setData($data);
            if ($this->form->isValid()) {
                $validatedData = $this->form->getData();
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