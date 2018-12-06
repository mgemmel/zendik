<?php


namespace TestModul\Controller;

use TestModul\Service\CurrencyConverter;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceManager;

class ContactController extends AbstractActionController
{
    public function indexAction()
    {
        $meno = "majo";

        return new ViewModel(["meno" => $meno]);
    }

    public function contactAction()
    {
        return new ViewModel();
    }
    public function convertAction(){
        //$converter = new CurrencyConverter();
        //return new ViewModel(["converter" => $converter->convertEURtoUSD(25)]);

        $service=$this->getServiceManager()->get(CurrencyConverter::class);
        //$service = $serviceManager->get(CurrencyConverter::class);
        $convertedAmount = $service->convertEURtoUSD(50);
        return new ViewModel(["converter" => $convertedAmount]);
    }

}
