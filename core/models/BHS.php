<?php
/*
 *
 */

class BHS {
    private $_db,
            $_data,
            $_userId,
            $_owner,
            $_categories,
            $_category;
    
    public function __construct($user = null){
        $this->_db = db::getInstance();
        $this->_userId = $user;
    }
    
    public function update($fields = array(), $id=null){
        
        if(!$id && $this->isLoggedIn()){
            $id = $this->data()->id;
        }
        
        if(!$this->_db->update('berichtsheft_entrys', $id, $fields)){
            throw new Exception('There was a Problem Updating your Data');
        } 
    }
    
    
    public function create($fields = array()){
        if(!$this->_db->insert('berichtsheft_entrys', $fields)){
            throw new Exception('Error in creating Entry');
        }
    }
    
    public function find($id=null, $user_id=null){
        if($id):
            //$field = (is_numeric($user_id)) ? 'id' : 'user_id';                        
            //$data = $this->_db->get('berichtsheft_entrys', array($field, '=', $id));
            $data =
                $user_id ?
                $this->_db->query("SELECT * FROM `berichtsheft_entrys` WHERE id=? and user_id=?", array($id, $this->_userId)) :
                $this->_db->get('berichtsheft_entrys', array('id', '=', $id));    
            
            if($data->count()){
                $this->_data = $data->first();
                $this->_owner = $this->data()->user_id==$this->_userId ? 'This Entry belongs to you!' : false;
                
                return true;
            }
        endif;
        return false;
    }
    
    public function getCategories($user_id=null){
        if($this->_userId):
            $this->_categories = $this->_db->get('berichtsheft_categories', array('user_id', '=', $this->_userId));
            //$this->_categories = $this->_db->query("SELECT * FROM `berichtsheft_entrys` WHERE id=? and user_id=?", array($id, $user_id));
            $this->_categories = $this->_categories->results();
            return $this->_categories;
        else:
            return "Something works here";
        endif;
        return false;
    }
    
    public function findCategory($id=null){
        $data = $this->_db->query("SELECT * FROM `berichtsheft_categories` WHERE id=? AND user_id=?", array($id, $this->_userId));
        $this->_category = $data->first();
        return $this->_category;
    }
    
    public function category(){ return $this->_category; }
    public function categories(){ return $this->_categories; }
    
    public function updateCategory($fields=array(), $id=null){
        if(!$id) $id = $this->category()->id;        
        if(!$this->_db->update('berichtsheft_categories', $id, $fields))
            throw new Exception('Category Update has been failed.');
    }
    
    public function createCategory($fields=array()){
        if(!$this->_db->insert('berichtsheft_categories', $fields))
            throw new Exception('Category creation has been failed.');
    }
    
    /**
     * Public function
     *
     **/
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
		foreach($array as $key => $val){
			$id = $val->id;
			$title = $val->title;
			$status = $val->status;
			$selected = $id == $i ? 'selected' : '';
			$return.= "<option value='$id' $selected>$title</option>";
			$x++;
		}
		return $return;
	 }
	 
	 
	 
    /**
     * Get Entries Array, Put, and reOrder
     */
    public function entries_build_array($id=null){
	if(!$id) $id = $this->_userId;
	$e = array('info'=>array('user'=>$id, 'total'=>0));	  
	$entries = $this->_db->query('SELECT * from berichtsheft_entrys where user_id = ? order by id ASC', array($id))->results();;	    
	$days = berichtsheft::days();
	// Put all entries in array	
	foreach($entries as $entry):		
	    $c = new stdClass();
	    //$day = $this->days[$entry->day];
	    $day = $days[$entry->day];
	    $c->title = $entry->title;
	    $c->content = $entry->content;
	    $c->day = $entry->day." ".$day;
	    $c->week = $entry->week;
	    $c->year = $entry->year;
	    $c->id = $entry->id;
	    
	    $e['content'][$entry->year][$entry->week][$entry->day][] = $c;
	    $e['info']['total']++;
	endforeach;
	return $e;
    }

    // Entries reordering in right Time Order
    public function entries_reorder($e=array()){
	$new_e = array();
	if(!empty($e)): foreach($e['content'] as $year=>$week_all){
	    //echo "YEAR: ",$year,"<br>";
	    ksort($week_all);
	    $new_e[$year] = $week_all;
	    foreach($week_all as $week=>$day_all):
		//echo " |--- WEEK: $week <br>";		    
		ksort($day_all);
		$new_e[$year][$week] = $day_all;
		foreach($day_all as $day=>$entries_all){			
		    //echo " ----| DAY: $day <br>";
		    $new_e[$year][$week][$day] = $entries_all;
		    foreach($entries_all as $entry){
		    //echo " ----| ### $entry->title <br>";
		    }
		}
	    endforeach;
	} endif;
	return array('info'=>$e['info'], 'content'=>$new_e);
    }
    
    public function get_all_entries($id=null){
	if(!$id) $id = $this->_userId;
	return $this->entries_reorder($this->entries_build_array($id));
    }
    
    
    /**
     * General Return function
     */
    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }

    public function data(){
        return $this->_data;
    }
    
    public function owner(){
        return $this->_owner;
    }    
}
    
?>