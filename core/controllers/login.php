<?php
/*
 *
 */

class login extends Controller{
    public $user;

    public function __construct(){

        $this->user = $this->model('User');
        if($this->user->isLoggedIn()) redirect::to('/profil/settings');

    }

    public function index(){

        if(input::exists()){
            //if(true):
            if(token::check(input::get('token'))):
                $validate = new validate;
                $validation = $validate->check($_POST, array(
                                'username'=>array('required'=>true),
                                'password'=>array('required'=>true),
                                                    ));

                if($validation->passed()){
                    $user = $this->model('User');
                    $remember = (input::get('remember') === 'on') ? true: false;
                    $login = $user->login(input::get('username'), input::get('password'), $remember);

                    if($login)
                        redirect::to('/profil');
                    else
                    $this->errors[] = "Login has failed!";

                } else {
                    $this->errors = $validation->errors();
                }
            else:
                $this->errors[] = "S".session::get('token');
                $this->errors[] = "I".input::get('token');
                $this->errors[] = "An Error has accoured [:TMM]. Please try again.";

            endif;
        }

        $this->view('login/login', $this);
        //debug(session::get('token'));
    }

    public function debug(){
        echo "logIn Debugging<br>";

        $user = $this->model('User');
        $sec  = $this->model('User', 17);
        echo $user->data()->username, "<br>";
        echo $sec->data()->username, "<br>";

        if($user->isLoggedIn()) echo "Logged In";

        debug($this->remember);
    }
}
