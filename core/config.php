<?php
    /*
     * Project: Gkiokan.NET v5.1
     * Author: Gkiokan Sali
     * This: Config
     */

    class Config {
        private static $config = array(
                            'mysql' => array(
                                'host'=>'127.0.0.1',
                                'username' => 'root',
                                'password' => '',
                                'db' => ''
                            ),
                            'remember' => array(
                                'cookie_name' => 'hash',
                                'cookie_expiry' => '604800'
                            ),
                            'session' => array(
                                'session_name' => 'user'
                            )
                        );
        
        public static function get($cfg){
            return self::$config[$cfg];
        }
        
    }
    
 
 ?>


