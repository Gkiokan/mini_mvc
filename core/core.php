<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 09.09.2014
       * * * * * * * * * * * * */

    // Core Class
    class core {
        public $page;
        public $uri;        
        public $params = [];        
        
        protected $controller = 'home';
        protected $method = 'index';
        
        function __construct(){
            $this->page = sanitize::check_startpage($_GET['page']);
            $this->uri  = sanitize::check($_GET['uri']);            
            $this->split_url();
            
            // Check the Controller if exists
            if(file_exists("core/controllers/".$this->params[0].".php")){
                $this->controller = $this->params[0];
                unset($this->params[0]);
            }
            
            // Start Checking the first Parameter here
            else {
                // If Controller not found, check if params was set
                if(!empty($this->params[0])):
                    // load error controller herer
                    $this->controller = "error";
                    unset($this->params[0]);
                    //debug('fall thought CNFT & PINE');
                else:
                    //template::load("../page-{$this->params[0]}.php");
                    template::load("core/views/error/404.php");
                endif;
            }
            // End Checking the first parameter for Error Rep.
            
            
            // Include the Controller and push it into the Instance
            require_once("core/controllers/".$this->controller.".php");        
            $this->controller = new $this->controller;
            $this->controller->remember();

            // Check for the Method in Object if exist
            if(isset($this->params[1])){
                if(method_exists($this->controller, $this->params[1])){
                    $this->method = $this->params[1];
                    unset($this->params[1]);
                }
            }
            // reset Params Array
            $this->params = $this->params ? array_values($this->params) : [];
            
            // Call the Controller
            call_user_func_array([$this->controller, $this->method], $this->params);
            
            
            
        }
        
        public static function ver(){
            echo "Gkiokan.NET v.5.1 core works!";
        }
        
        public function split_url(){
            $this->params = explode("/", filter_var(rtrim($this->uri, "/"), FILTER_SANITIZE_URL));
        }
    }

    
?>