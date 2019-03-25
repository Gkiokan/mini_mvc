<?php
class UserData {
    
    
    public function build($user){
        $data = db::getInstance()->get('users', array('username', '=', $user));
        //debug($data);        
        if($data->count()>0){
            foreach($data->first() as $key=>$val){
                $this->{$key} = $val;
            }
        }
        else {
            $this->error = "User Not Found or doesn't exist!";
        }
        return $this;
    }
    
    
}
