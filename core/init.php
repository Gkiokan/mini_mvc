<?php /* * * * * * * * * * * * *
       * Project: Gkiokan NET - mini MVC
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net/
       * * * * * * * * * * * * */

    session_save_path("/tmp"); session_start();

    // Include functions file
    require_once('function.php');

    // Include Config
    require_once('config.php');


    spl_autoload_register(function($class){
        require_once("../class/".$class.".php");
    });
