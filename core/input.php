<?php
class input {
    
    public static function exists($type='post'){
        switch($type){
            case 'post':
                return (!empty($_POST)) ? true: false;
            break;
            case 'get':
                return (!empty($_GET)) ? true : false;
            break;
            default:
                return false;
            break;
        }
    }
    
    
    public static function get($item){
        if(isset($_POST[$item])){
            return $_POST[$item];
        } else if($_GET[$item]){
            return $_GET[$item];
        }
        return '';
    }
    
    public static function all($type='post'){
        switch($type){
            case 'post':
                return (!empty($_POST)) ? $_POST: false;
            break;
            case 'get':
                return (!empty($_GET)) ? $_GET : false;
            break;
            default:
                return false;
            break;
        }
    }
    
    
}