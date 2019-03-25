<?php

class Register extends Controller {
    
    /*
     * Initialize Register form
     */
    
    public function __construct(){
        $this->user = $this->model('User');
        
        if($this->user->isLoggedIn()) redirect::to('/profil/edit');
    }
    
    public function index(){       
    
        if(input::exists()):
            if(token::check(input::get('token'))):
            $validate = new validate();
            $check = $validate->check($_POST, array(
                            'username' => array(
                                    'required'=> true,
                                    'min' => 3,
                                    'max' => 20,
                                    'unique' => 'users'
                                        ),
                            'email' => array(
                                    'required'=>true,
                                    'min'=>5,
                                    'max'=>100,
                                        ),
                            'password' => array(
                                    'required'=>true,
                                    'min'=>6
                                        ),
                            'password_repeat' => array(
                                    'required'=>true,
                                    'matches'=>'password'
                                        )
                        ));
            
            if($check->passed()){
                session::flash('register_step_2', 'Your account has been created.<br>You can now fill in your additional Information and verify your Account.<br><a href="/login" class="label label-success" ><span class="glyphicon glyphicon-log-in"></span> LogIn Now</a><br>');
                
                $user = $this->model('User');
                $salt = hash::salt(32);
                
                try{
                    $user->create(array(
                                'username' => input::get('username'),
                                'password' => hash::make(input::get('password'), $salt),
                                'email' => input::get('email'),
                                'salt' => $salt,
                                'added' => time()
                                ));
                    
                } catch(Exception $e){
                    die($e->getMessage());
                }
            
                redirect::to("/register/step2");
                
            } else {
                $this->errors = $check->errors();
            }    
            
            endif;
        endif;
    
        $this->view('register/register', $this);    
    }   
    
    /*
     * Register Step 2
     */
    public function step2(){
        
        $this->view('register/register_step2', $this);
    }
    
    
}
