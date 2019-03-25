<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 09.09.2014
       * * * * * * * * * * * * */

    class sanitize {
        public $input;
        public $tmp;
               
        public static function check($input){
            if(!$input) return false; // sanitize::start_page();
            else return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        }
        
        public static function check_startpage($input){
            if(!$input) return "welcome";
            else return self::check($input);
        }
        
        
    } 
    
?>