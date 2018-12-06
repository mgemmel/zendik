<?php
/**
 * Created by PhpStorm.
 * User: majo
 * Date: 6.12.2018
 * Time: 12:21
 */

namespace TestModul\Form;

use Zend\Form\Element;
use Zend\Form\Factory;
use Zend\Form\Form;
use Zend\Hydrator\ArraySerializable;

class ContactForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('addName');
        // Set POST method for this form
        $this->addInputFilter();
        $this->setAttributes(array(
            'name' => 'addName',
            'role' => 'form',
            'method'=>'POST',
            'action' => '/contact/add',
        ));
        // Add form elements
        $this->addElements();
    }

    private function addInputFilter()
    {
        // Get the default input filter attached to form model.
        $inputFilter = $this->getInputFilter();

        $inputFilter->add([
                'name'     => 'email',
                'required' => true,
                'filters'  => [
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => 'EmailAddress',
                        'options' => [
                            'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                            'useMxCheck' => false,
                        ],
                    ],
                ],
            ]
        );

        $inputFilter->add([
                'name'     => 'subject',
                'required' => true,
                'filters'  => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                    ['name' => 'StripNewlines'],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'min' => 1,
                            'max' => 128
                        ],
                    ],
                ],
            ]
        );

        $inputFilter->add([
                'name'     => 'body',
                'required' => true,
                'filters'  => [
                    ['name' => 'StripTags'],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'min' => 1,
                            'max' => 4096
                        ],
                    ],
                ],
            ]
        );
    }

    private function addElements()
    {
        // Add "email" field
        $this->add([
            'type'  => 'text',
            'name' => 'email',
            'attributes' => [
                'id' => 'email'
            ],
            'options' => [
                'label' => 'Your E-mail',
            ],
        ]);

        // Add "subject" field
        $this->add([
            'type'  => 'text',
            'name' => 'subject',
            'attributes' => [
                'id' => 'subject'
            ],
            'options' => [
                'label' => 'Subject',
            ],
        ]);

        // Add "body" field
        $this->add([
            'type'  => 'textarea',
            'name' => 'body',
            'attributes' => [
                'id' => 'body'
            ],
            'options' => [
                'label' => 'Message Body',
            ],
        ]);

        // Add the submit button
        $this->add([
            'type'  => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Submit',
            ],
        ]);
    }

}