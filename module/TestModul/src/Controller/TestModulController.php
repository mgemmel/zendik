<?php


namespace TestModul\Controller;

use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TestModulController extends AbstractActionController
{
    public function indexAction()
    {
        $meno = "majo";

        return new ViewModel(["meno" => $meno]);
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        $value = 256;
        return $this->redirect()->toRoute('testmodul', ['action' => 'delete', 'id' => $value]);
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id', -1);
        return new ViewModel(["id" => $id]);
    }

    public function vypisAction()
    {
        $pole = array(1, 2, 3, 5, 6);
        return new ViewModel(["pole" => $pole]);
    }

    public function indexAutoAction()
    {

        return new ViewModel();
    }

    public function aboutmeAction()
    {
        return new ViewModel();
    }
}
