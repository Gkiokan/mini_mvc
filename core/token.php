<?php
/*
 *
 */

class token {
    public static function generate(){
        if(session::exists('token')):
            session::put('token_check', 'token session already found :: '.session::get('token'));
            return session::get('token');
        endif;
        return session::put('token', md5(uniqid()));
    }
    
    public static function check($token){
        $tokenName = "token";
        
        if(session::exists($tokenName) && $token === session::get($tokenName)){
            session::delete($tokenName);
            return true;
        }
        
        return false;
    }
}


?>