<?php
/**
 * Created by PhpStorm.
 * User: majo
 * Date: 12.12.2018
 * Time: 16:36
 */

namespace TestModul\Form;


use Zend\Form\Form;

class BookForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('addName');
        // Set POST method for this form
        $this->addInputFilter();
        $this->setAttributes(array(
            'name' => 'addBook',
            'role' => 'form',
            'method' => 'POST',
            'action' => '/book/add',
        ));
        // Add form elements
        $this->addElements();
    }

    private function addInputFilter()
    {
        // Get the default input filter attached to form model.
        $inputFilter = $this->getInputFilter();

        $inputFilter->add([
                'name' => 'nazov',
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                            'useMxCheck' => false,
                            'min' => 1,
                            'max' => 150
                        ],
                    ],
                ],
            ]
        );

        $inputFilter->add([
                'name' => 'autor',
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                            'useMxCheck' => false,
                            'min' => 1,
                            'max' => 100
                        ],
                    ],
                ],
            ]
        );
        $inputFilter->add([
                'name' => 'datum',
                'required' => true,
            ]
        );
        $inputFilter->add([
                'name' => 'popis',
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'min' => 1,
                            'max' => 500
                        ],
                    ],
                ],
            ]
        );
        $inputFilter->add([
                'name' => 'cena',
                'required' => true,
            ]
        );

        $inputFilter->add([
                'name' => 'select',
                'required' => true,
                'filters' => [
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

    }

    private function addElements()
    {
        $this->add([
            'type' => 'hidden',
            'name' => 'id',
            'attributes' => [
                'id' => 'id'
            ],
            'options' => [
                'label' => 'ID',
            ],
        ]);
        $this->add([
            'type' => 'text',
            'name' => 'nazov',
            'attributes' => [
                'id' => 'nazov'
            ],
            'options' => [
                'label' => 'Názov',
            ],
        ]);
        $this->add([
            'type' => 'text',
            'name' => 'autor',
            'attributes' => [
                'id' => 'autor',
                'max' => '2018-12-31'
            ],
            'options' => [
                'label' => 'Autor',
            ],
        ]);
        $this->add([
            'type' => 'date',
            'name' => 'datum',
            'attributes' => [
                'id' => 'datum'
            ],
            'options' => [
                'label' => 'Dátum vydania',
            ],
        ]);
        $this->add([
            'type' => 'textarea',
            'name' => 'popis',
            'attributes' => [
                'id' => 'popis'
            ],
            'options' => [
                'label' => 'Popis',
            ],
        ]);
        $this->add([
            'type' => 'number',
            'name' => 'cena',
            'attributes' => [
                'id' => 'cena',
                'min' => 0
            ],
            'options' => [
                'label' => 'Cena',
            ],
        ]);
        $this->add([
            'type' => 'select',
            'name' => 'select',
            'attributes' => [
                'id' => 'select'
            ],
            'options' => [
                'label' => 'Kategória',
                'value_options' => array(
                    '0' => 'Román',
                    '1' => 'Sci-Fi',
                    '2' => 'Rozprávka',
                    '3' => 'Dokument',
                )
            ],
        ]);
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Potvrdiť',
            ],
        ]);
    }
}