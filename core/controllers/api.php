<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 10.11.2014
       * * * * * * * * * * * * */

    class api extends Controller {
        
        public function __construct(){
            //show_all_errors();
        }
        
        public function time(){
            $time = time();
            $this->view('api/json/time', $time);
        }
        
        
        public function debug($a, $b, $c, $d, $e, $f){
            
            $this->view('api/json/debug', $a);
        }
        
        public function user($a){
            $user = $this->model('UserData')->build($a);
            
            $this->view('api/json/user', $user);
        }
        
        
    }
    