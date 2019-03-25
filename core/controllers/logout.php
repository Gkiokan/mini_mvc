<?php
class logout extends Controller{
	 
	 public function index(){
		  $this->model('User')->logout();
		  
		  redirect::to('login');
	 }
}
