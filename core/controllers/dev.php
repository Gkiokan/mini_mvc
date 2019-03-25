<?php
    class dev extends Controller {
        
        public $a;
        public $b;
        
        public function index(){
            $this->view_load('dev_env');
            return "This is the Controller func of dev.";
        }
        
        public function test($name="", $id=""){
            $this->a = "ABC";
            $this->b = "DEF";
            
            return "Usern Information: $name | $id";
        }
        
        public function debug(){
            $this->view('dev/debug');
        }
        
        public function vars(){
            $this->view('dev/variable');
        }
        
        
    
    }
    

?>

