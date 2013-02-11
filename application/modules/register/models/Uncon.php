<?php

class Register_Model_Uncon extends In2it_Model_Model
{
    protected $_unconId;
    protected $_name;
    protected $_twitter;
    protected $_title;
    protected $_abstract;
    protected $_votes;
    
    public function setId($unconId)
    {
        $this->_unconId = (int) $unconId;
        return $this;
    }
    public function getId()
    {
        return $this->_unconId;
    }
    public function setName($name)
    {
        $this->_name = (string) $name;
        return $this;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function setTwitter($twitter)
    {
        $this->_twitter = (string) $twitter;
        return $this;
    }
    public function getTwitter()
    {
        return $this->_twitter;
    }
    public function setTitle($title)
    {
        $this->_title = (string) $title;
        return $this;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function setAbstract($abstract)
    {
        $this->_abstract = (string) $abstract;
        return $this;
    }
    public function getAbstract()
    {
        return $this->_abstract;
    }
    public function setVotes($votes)
    {
        $this->_votes = (int) $votes;
        return $this;
    }
    public function getVotes()
    {
        return $this->_votes;
    }
    public function populate($row)
    {
        if (is_array($row)) {
            $row = new ArrayObject($row, ArrayObject::ARRAY_AS_PROPS);
        }
        
        if (isset ($row->unconId)) { $this->setId($row->unconId); }
        if (isset ($row->name)) { $this->setName($row->name); }
        if (isset ($row->twitter)) { $this->setTwitter($row->twitter); }
        if (isset ($row->title)) { $this->setTitle($row->title); }
        if (isset ($row->abstract)) { $this->setAbstract($row->abstract); }
        if (isset ($row->votes)) { $this->setVotes($row->votes); }
    }
    public function toArray()
    {
        return array (
            'unconId' => $this->getId(),
            'name' => $this->getName(),
            'twitter' => $this->getTwitter(),
            'title' => $this->getTitle(),
            'abstract' => $this->getAbstract(),
            'votes' => $this->getVotes(),
        );
    }
}

