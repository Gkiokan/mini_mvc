<?php
    class home extends Controller {
        
        public function __construct(){
            $this->user = $this->model('User');
        }
        
        public function index($name=""){
            $user = $this->user;
            
            $this->view('home/welcome', $this);
        }


    }

?>
