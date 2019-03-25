<?php
    class profil extends Controller {

        public function __construct(){
            $this->user = $this->model('User');

            if(!$this->user->isLoggedIn()) redirect::to("/login");
        }

        public function index($username="", $uid=""){
            // $this->settings();
            // redirect::to('/profil/settings');
            redirect::to('/profil/ProjectAccess');
        }

        public function me($username=""){
            $user = $this->user;

            $this->view('profil/user', $this);
            //$this->view('profil/me', $user);
        }

        public function user($username=""){
            $user = $this->model('User', $username);

            $this->view('profil/user', $this);
        }

        public function settings(){

            $this->view('profil/settings', $this);
        }

        public function ProjectAccess(){

            $this->view('profil/ProjectAccess', $this);
        }

        public function edit(){
            $user = $this->user;

            if(input::exists()):
                if(token::check(input::get('token'))){

                    $validate = new validate();
                    $check  = $validate->check($_POST, array(
                                                'name' => array('required'=>true, 'min'=>3),
                                                'vorname' => array('required'=>true, 'min'=>5),
                                                     ));
                    if($check->passed()){
                        try{
                            $user->update(array(
                                            'name' => input::get('name'),
                                            'vorname' => input::get('vorname'),
                                            'bday' => input::get('bday'),
                                            'adresse' => input::get('adresse'),
                                            'plz' => input::get('plz'),
                                            'stadt' => input::get('stadt')
                                                ));
                            //redirect::to('profil/edit');

                        } catch(Exception $e){ die($e); }
                        session::flash('account_edit_message', '<div class="bg-success text-success">Your Profile has been saved</div>');
                    } else { $this->errors = $check->errors(); }


                    if(input::get('password')):
                    $pass_validate = new validate();
                    $password = $pass_validate->check($_POST, array(
                                                'password' => array('required'=>true, 'min'=>6),
                                                'password_new' => array('required'=>true, 'min'=>6),
                                                'password_again' => array('required'=>true, 'min'=>6, 'matches'=>'password_new'),
                                                        ));
                    if($password->passed()){
                        $this->errors[] = "<div class='bg-info text-info'>Password may Change now to ".input::get('password_new')."</div>";
                    } else {
                        //$this->errors[] = "Something went wrong, while checking your Password Change request.";
                        foreach($password->errors() as $error){
                            $this->errors[] = "<div class='bg-danger text-danger'>".$error."</div>";
                        }
                    }
                    endif;

                }
            endif;
            $user = $this->model('User');

            $this->view('profil/edit', $this);
        }


    }

?>
