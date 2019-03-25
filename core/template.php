<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 09.09.2014
       * * * * * * * * * * * * */

    class template {
        private $file;
        private $file_ok;
        private $prepare_name;
        private $file_path;
        private $page_error_404 = "page-404.php";
        
        public static $title;
        public static $description;
        public static $keywords;
        public static $header;
        public static $view;
        public static $footer;
        
        function __construct($file){
            $this->file = $file;
        }
        
        public function title($a){
            $this->title = $a;
        }
        
        public function set($key, $value){
            $this->$key = $value;
        }
        
        // Function get Header from File
        public static function header($obj){
            $view = $obj->template->view;
            
            if(file_exists('core/views/header/'.$view.'.php')):
                include_once('core/views/header/'.$view.'.php');    
            else:
                include_once('core/views/header/header.php');
            endif;
        }
        
        public function load_header($obj){
            call_user_func('template::header', $obj);
        }
    
        // Function get Footer from file
        public static function footer(){
            include_once('core/views/footer/footer.php');
        }
        
        // Function check for file
        public static function check_file($fn){
            $prepare_name = $fn;
            
            if(file_exists($prepare_name))
                include_once($prepare_name);
            else
                include_once('core/views/error/404.php');
            
            //return $file_ok;
        }
        
        // Function include
        public static function load($file){
            include_once($file);
        }
        
        public static function showErrors($errors){
            if($errors):
                foreach($errors as $error):
                    echo $error, "<br>";
                endforeach;    
            endif;
        }
        
    }
?>