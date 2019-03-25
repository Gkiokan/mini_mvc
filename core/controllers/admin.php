<?php
/*
 *
 *
 */

 
class admin extends Controller {
    
    public function __construct(){
        //show_all_errors();
        $this->user = $this->model('User');
        $this->admin = $this->model('AdminModel');
    }
    
    public function index(){
        
        template::header($this);
            echo "<a href='/admin/ManageGroups'>Manage Groups</a><br>";
            echo "<a href='/admin/createGroup'>Create Group</a><br>";
        
        template::footer();
    }
    
    public function ManageGroups($groupID=null){
        
        $this->view('admin/ManageGroups', $this);
    }
    
    public function EditGroup($groupID=null){
        if(!$groupID) redirect::to('/admin/ManageGroups');
        $this->groupID = $groupID;
        
        if(input::exists()):
        if(token::check(input::get('token'))):
            $update = $this->admin->updateGroup($this->groupID, array(
                                                        'name'=>input::get('name'),
                                                        'options'=>input::get('options')
                                                             ));
            
            if($update) $this->errors[] = "<p class='text-success bg-success'>Group Upate successfull</p>";
            else $this->errors[] = "<p class='text-danger bg-danger'>Group Update has been failed</p>";
        endif; endif;
        
        $this->view('admin/EditGroup', $this);
    }
    
    public function createGroup(){
        
        if(input::exists()):
        if(token::check(input::get('token'))):
            $check = new validate();
            $check = $check->check(input::all(), array('name'=>array('unique'=>$this->admin->table_group)));
            
            if($check->passed()):
                $insert = $this->admin->createGroup(array('name'=>input::get('name'), 'options'=>input::get('options')));
                if($insert){
                    $lastId = $this->admin->_db->lastInsertId();
                    session::flash('create_group_message', "<p class='text-success bg-success'>Group has been created</p>");
                    redirect::to("/admin/EditGroup/$lastId");
                }
                else{ $this->errors[] = "<p class='text-danger bg-danger'>Creation failed.</p>";}
            else:
                $this->errors = $check->errors();
            endif;
        endif; endif;
        
        $this->view('admin/createGroup', $this);
    }
    
}

?>