<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net/
       * * * * * * * * * * *
       * * * * * * * * * * *
       * * * * * * * * * * * * */

    session_save_path("/tmp"); session_start();

    /*
    // Include Config
    require_once('config.php'); 
    
    // Include Core
    require_once('Controller.php');
    require_once('core.php');    
       
    // Include DB connection file
    require_once('db.php');
    
    // Include Input class
    require_once('input.php');
    
    // Include Template func
    require_once('template.php');
    */
    
    spl_autoload_register(function($class){
        require_once($class.".php");
    });
    
    // Include Variable
    require_once('variable.php');
    
    // Include functions file
    require_once('functions.php');