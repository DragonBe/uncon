<?php

class Register_Form_Uncon extends Zend_Form
{

    public function init()
    {
        $this->addElement('text', 'name', array (
            'Label' => 'Your name',
            'Description' => 'e.g. John Doe',
            'Required' => true,
            'Filters' => array (
                'StringTrim',
                'StripTags',
            ),
            'Validators' => array (
                array ('StringLength', false, array ('min' => 5, 'max' => 50)),
            ),
        ));
        $this->addElement('text', 'twitter', array (
            'Label' => 'Your twitter name (optional)',
            'Description' => 'e.g. @johndoe',
            'Required' => false,
            'Filters' => array (
                'StripTags',
                'StringTrim',
            ),
            'Validators' => array (
                array ('regex', false, array ('pattern' => '/^@[a-zA-Z0-9\-\_]+$/')),
            )
        ));
        $this->addElement('text', 'title', array (
            'Label' => 'Title for your uncon session',
            'Description' => 'The power of uncon sessions',
            'Required' => true,
            'Filters' => array (
                'StripTags',
                'StringTrim',
            ),
            'Validators' => array (
                array ('StringLength', false, array ('min' => 1, 'max' => 150)),
            ),
        ));
        $this->addElement('textarea', 'abstract', array (
            'Label' => 'What is your uncon session about',
            'Required' => false,
            'Filters' => array (
                'StripTags',
                'StringTrim',
            ),
            'Validators' => array (),
            'Rows' => 6,
            'Cols' => 35,
        ));
        $this->addElement('submit', 'send', array (
            'Label' => 'Send your session',
            'Ignore' => true,
        ));
        $this->addElement('hash', 'hash');
    }


}

