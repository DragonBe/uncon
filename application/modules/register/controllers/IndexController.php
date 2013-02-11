<?php

class Register_IndexController extends Zend_Controller_Action
{

    protected $_session;
    
    public function init()
    {
        $this->_session = new Zend_Session_Namespace('register');
    }

    public function indexAction()
    {
        $form = new Register_Form_Uncon(array (
            'action' => '/register/index/process',
            'method' => 'POST',
        ));
        
        if (isset ($this->_session->name)) {
            $form->getElement('name')->setValue($this->_session->name);
        }
        if (isset ($this->_session->twitter)) {
            $form->getElement('twitter')->setValue($this->_session->twitter);
        }
        
        if (isset ($this->_session->registerForm)) {
            $form = unserialize($this->_session->registerForm);
            unset ($this->_session->registerForm);
        }
        
        $this->view->form = $form;
    }

    public function processAction()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->_helper->redirector('index','index','register');
        }
        $form = new Register_Form_Uncon(array (
            'action' => '/register/index/process',
            'method' => 'POST',
        ));
        if (!$form->isValid($this->getRequest()->getPost())) {
            $this->_session->registerForm = serialize($form);
            return $this->_helper->redirector('index','index','register');
        }
        $this->_session->name = $form->getElement('name')->getValue();
        $this->_session->twitter = $form->getElement('twitter')->getValue();
        
        $uncon = new Register_Model_Uncon($form->getValues());
        $uncon->setVotes(0);
        $unconMapper = new Register_Model_UnconMapper();
        $unconMapper->save($uncon);
        
        // store data in database
        return $this->_helper->redirector('success', 'index', 'register');
    }

    public function successAction()
    {
        // action body
    }


}





