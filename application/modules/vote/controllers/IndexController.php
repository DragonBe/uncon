<?php

class Vote_IndexController extends Zend_Controller_Action
{
    protected $_session;
    
    public function init()
    {
        $this->_session = new Zend_Session_Namespace('vote');
    }

    public function indexAction()
    {
        $unconCollection = new Register_Model_UnconCollection();
        $unconMapper = new Register_Model_UnconMapper();
        $unconMapper->fetchAll(
            $unconCollection, 'Register_Model_Uncon', null, 'votes DESC');
        
        $this->view->list = $unconCollection;
        
        if (!isset ($this->_session->voted)) {
            $this->_session->voted = 0;
        }
        $this->view->voted = $this->_session->voted;
        
        $token = sha1(rand(1024, 56535) . 'tokiepokie');
        $this->_session->token = $token;
        $this->view->token = $token;
    }

    public function voteAction()
    {
        $unconId = $this->getRequest()->getParam('id', 0);
        $session = $this->getRequest()->getParam('token', null);
        
        if ($session !== $this->_session->token) {
            return $this->_helper->redirector('index', 'index', 'vote');
        }
        
        $uncon = new Register_Model_Uncon();
        $unconMapper = new Register_Model_UnconMapper();
        $unconMapper->find($uncon, $unconId);
        
        if (0 < $uncon->getId()) {
            $uncon->setVotes($uncon->getVotes() + 1);
        }
        
        $unconMapper->save($uncon);
        
        $this->_session->voted++;
        return $this->_helper->redirector('index', 'index', 'vote');
    }


}



