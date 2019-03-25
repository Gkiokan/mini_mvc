<?php
/*
 *
 */

class User {
    private $_db,
            $_sessionName,
            $_cookieName,
            $_isLoggedIn,
            $_data;

    public function __construct($user = null){
        $this->_db = db::getInstance();

        $this->_sessionName = 'user';
        $this->_cookieName = 'remember';


        if(!$user){
            if(session::exists($this->_sessionName)){
                $user = session::get($this->_sessionName);
                if($this->find($user)){
                    $this->_isLoggedIn = true;
                } else {
                    // process Logout
                }
            }
        } else {
            $this->find($user);
        }

    }

    public function update($fields = array(), $id=null){

        if(!$id && $this->isLoggedIn()){
            $id = $this->data()->id;
        }

        if(!$this->_db->update('users', $id, $fields)){
            throw new Exception('There was a problem saving your Account');
        }
    }

    public function create($fields = array()){
        if(!$this->_db->insert('users', $fields)){
            throw new Exception('Error in creating account');
        }
    }

    public function find($user=null){
        if($user):
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
        endif;
        return false;
    }

    public function login($username=null, $password=null, $remember){
        if(!$username && !$password && $this->exists()){
            session::put($this->_sessionName, $this->data()->id);
            cookie::put('autoLogin', 'true', time()+64800);
            return true;
        } else {
            $user = $this->find($username);
            if($user):
                if($this->data()->password === hash::make($password, $this->data()->salt)){
                    session::put($this->_sessionName, $this->data()->id);
                    cookie::put('normalLogin', 'true', 64800);
                    if($remember){
                        $hash = hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
                        if(!$hashCheck->count()){
                            $this->_db->insert('users_session', array(
                                                'user_id'=> $this->data()->id,
                                                'hash' => $hash
                                                ));
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }
                        cookie::put($this->_cookieName, $hash, time()+64800);
                    }
                    return true;
                }
            endif;
        }
        return false;
    }

    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }

    public function logout(){
        $clear_db = $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
        session::delete($this->_sessionName);
        cookie::delete($this->_cookieName);
    }


    public function data(){
        return $this->_data;
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

    public function getPercentage(){
        $mind = array('username', 'vorname', 'name', 'bday', 'adresse', 'plz', 'stadt');
        $max  = count($mind);
        $found = array('found'=>0, 'max'=>$max);

        foreach($mind as $need):
            if(isset($this->data()->$need) and !empty($this->data()->$need)):
              $found['found']++;
            endif;
        endforeach;

        $percentage = $found['found'] / $found['max'] * 100;
        if($percentage===100): $percentage = number_format($percentage);
        else: $percentage = (round($percentage)%5 === 0 ) ? round($n) : round(($percentage+5)/5)*5;
        endif;

        return $percentage;
    }
}

?>
