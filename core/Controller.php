<?php
    class Controller {
        public $temp;
        public $parse;
        public $model = [];
        public $view = 'header';
        public $footer = 'footer';
        public $template = [];
        public $remember;
        public $user;


        public function model($model, $params=null){
            require_once('models/'.$model.'.php');
            //$this->model = new $model($params);
            //return $this->model;
            return new $model($params);

        }


        public function view($view, $data = []){
            $this->template = new template;
            $this->template->view = $this->view;
            $this->template->footer = $this->footer;
            
            if(file_exists('core/views/'.$view.'.php')):
                require_once('views/'.$view.'.php');
            else:
                $this->view('error/404', $this);
                //template::check_file('404');
            endif;
        }


        public function view_load($view){
            template::check_file($view);
            //require_once('../page-'.$view.'.php');
        }


        public function remember(){
          $this->user = $this->model('User');

            if(cookie::exists('remember') && !session::exists('user')){
                $hash = cookie::get('remember');
                $hashCheck = db::getInstance()->get('users_session', array('hash', '=', $hash));
                if($hashCheck->count()){
                    $this->remember = "Controller found remember hash $hash X";
                    $user = $this->model('User', $hashCheck->first()->user_id);
                    $login = $user->login();
                    if($login)
                        redirect::to('/profil/settings');
                }
            }
        }

    }

?>
