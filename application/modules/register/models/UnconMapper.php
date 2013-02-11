<?php

class Register_Model_UnconMapper extends In2it_Model_Mapper
{
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Register_Model_DbTable_Uncon');
        }
        return parent::getDbTable();
    }
    public function save(Register_Model_Uncon $uncon)
    {
        if (0 < $uncon->getId()) {
            $this->getDbTable()->update($uncon->toArray(), array ('unconId = ?' => $uncon->getId()));
        } else {
            $this->getDbTable()->insert($uncon->toArray());
        }
    }
}

