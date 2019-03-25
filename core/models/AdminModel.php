<?php

class AdminModel {
    public $_db;
    public $table_group = "groups";
    
    public function __construct(){
        $this->_db = db::getInstance();    
        
    }
    
    public function getGroups($id=null){
        
        $groups = $this->_db->query("SELECT * FROM $this->table_group")->results();
        return $groups;
    }   
    
    public function getGroup($id=null){
        return $this->_db->get($this->table_group, array('id','=',$id))->first(); 
    }
    
    public function updateGroup($id, $data){
        return $this->_db->update($this->table_group, $id, $data);
    }
    
    public function createGroup($fields){
        return $this->_db->insert($this->table_group, $fields);
    }
    
    
}


?>