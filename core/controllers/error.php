<?php
/*
 * Error Controller
 * 
 */

class error extends Controller {
    
    public function __construct(){
        $this->user = $this->model('User');
        
        
    }
    
    public function index(){
        
        //$this->view_load('404');
        
        $this->view('errors/404', $this);
    }
    
}