<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 09.09.2014
       * * * * * * * * * * * * */

    // Debug Function
    function debug($input, $typ=1){
        echo "<pre>";
        if($typ==1){             
            print_r($input);
        }
        else if($typ==2){
            var_dump($input); 
        }
        echo "</pre>";
    }
    
    function get_base_url(){
        $base = sanitize::check($_SERVER['HTTP_HOST']);
        echo "//$base";
    }
    
    function get_header($obj){
        call_user_func('template::header', $obj->template);
    }
    
    
    function show_all_errors(){
        error_reporting(E_ALL);
        ini_set('display_errors','On');         
    }
?>