<?php


class PostsModel {

    private $_db,
            $_categories,
            $_category,
            $_userId;

    private $postStatusOptions = array(0=>'Closed', 1=>'Open for Users', 2=>'Open with shared Link', 3=>'Open for All');

    public function __construct($user = null){

        $this->_userId =  $user;
        $this->_db = db::getInstance();
    }


    public function postStatusOptions($o){
        foreach($this->postStatusOptions as $option=>$name):
          $select = $o==$option ? 'selected' : '';
          echo "<option value='$option' $select>$name</option>";
        endforeach;
    }

    public function parseOption($array=array(), $i=null){
     $pre = "";
     $x = 0;
     foreach($array as $key=>$val){
       $select = $i==$key ? 'selected' : '';
       $pre.= "<option value='$key' $select>$val</option>";
       $x++;
     }
     return $pre;
    }

    public function parseOptionObject($array=array(), $i=null){
     $x=0;
     $return = "";
     foreach($array as $key => $val){
       $id = $val->id;
       $title = $val->name;
       $status = $val->status;
       $selected = $id == $i ? 'selected' : '';
       $return.= "<option value='$id' $selected>$title $status</option>";
       $x++;
     }
     return $return;
    }

    public function findCategory($id){
      $this->_category = $this->_db->get('posts_categories', array('id', '=', $id))->first();
      return $this->_category;
    }

    public function getCategory(){ return $this->_category; }
    public function getCategories(){ return $this->_categories; }
    public function getPostStatus($nr){ return $this->postStatusOptions[$nr]; }

    public function updateCategory($fields=array(), $id=null){
      if(!$id) $id = $this->_category->id;
      if(!$this->_db->update('posts_categories', $id, $fields))
      throw new Exception('Category Update has been failed.');
    }

    public function createCategory($fields=array()){
      if(!$this->_db->insert('posts_categories', $fields))
      throw new Exception('Category creation has been failed.');
    }

    public function allCategories(){
      $this->_categories = $this->_db->query("select * from `posts_categories`")->results();
      return $this->_categories;
    }

}

?>
