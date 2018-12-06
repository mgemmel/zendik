<?php


namespace TestModul\Controller;

use TestModul\Service\CurrencyConverter;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceManager;
use TestModul\Form\ContactForm;

class ContactController extends AbstractActionController
{

    protected $converter;
    protected $form;
    public function __construct($converter,ContactForm $form)
    {
        $this->form=$form;
        $this->converter=$converter;
        //$this->form->addInputFilter();
        /*$form->setAttribute('method', 'post');
        $form->setAttribute('action', $this->url('contact/add'));*/
        //var_dump($this->form);die;
    }

    public function indexAction()
    {
        $meno = "majo";

        return new ViewModel(["meno" => $meno]);
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

            /*$submitedFormData = $this->params()->fromPost();
            if(!empty($submitedFormData)){
                if($submitedFormData->is)
            }*/
        }
        //print_r($request);
        return new ViewModel(['form' => $this->form]);
    }
    public function convertAction(){
        //$converter = new CurrencyConverter();
        //return new ViewModel(["converter" => $converter->convertEURtoUSD(25)]);

        //$service=$this->getServiceManager()->get(CurrencyConverter::class);
        //$service = $serviceManager->get(CurrencyConverter::class);
        //$convertedAmount = $service->convertEURtoUSD(50);

        return new ViewModel(["converter" => $this->converter->convertEURtoUSD(50)]);
    }

}
