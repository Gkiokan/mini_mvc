<?php

/*
 * Gkiokan.NET
 * DB Class
 * Author: Gkiokan Sali
 * URL: www.gkiokan.net
 * Date: 15.11.2014
 *
 */

 class db {

    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    private function __construct(){
        try {
            $this->_pdo = new PDO('mysql:host=rdbms.strato.de;dbname=DB1222066;charset=utf8', 'U1222066', 'GkiokanVaneSSa!');
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_pdo->exec("SET CHARACTER SET utf8");

        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    /*
     * General Query func
     */
    public function query($sql, $params = array(), $add=false){
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            // Prepare Params
            $x = 1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }

            // Execute Query here
            if($this->_query->execute()){
                if(!$add):
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count   = $this->_query->rowCount();
                endif;
            }
            else {
                $this->_error = true;
            }
        }
        return $this;
    }

    /*
     * DB Action
     */
    public function action($action, $table, $where=array(), $additional=false){
        if(count($where) === 3){
            $operators = array('=', '>', '<', '>=', '<=');

            $field    = $where[0];
            $operator = $where[1];
            $value    = $where[2];

            if(in_array($operator, $operators)){
                $sql = "{$action} FROM `{$table}` WHERE `{$field}` {$operator} ? ";
                if(!$this->query($sql, array($value), $additional)->error()){
                    return $this;
                }
            }
        }
        return false;
    }

    public function get($table, $where){
        return $this->action('SELECT *', $table, $where);
    }

    public function delete($table, $where){
        return $this->action('DELETE', $table, $where, true);
    }


    public function insert($table, $fields=array()){
        $keys = array_keys($fields);
        $values = '';
        $x = 1;

        foreach($fields as $field){
            $values .= '?';
            if($x < count($fields)) $values .= ', ';
            $x++;
        }

        $sql = "INSERT INTO `{$table}` (`" . implode('`,`', $keys) . "`) VALUES ({$values})";

        if(!$this->query($sql, $fields, true)->error()){
            return $this;
        }

        return false;
    }


    public function update($table, $id, $fields){
        $set = '';
        $x = 1;

        foreach($fields as $name=>$value){
            $set .= "`{$name}` = ?";
            if($x < count($fields)) $set.=', ';
            $x++;
        }

        $sql = "UPDATE `{$table}` SET {$set} WHERE id = {$id}";

        if(!$this->query($sql, $fields, true)->error()){
            return $this;
        }
        return false;
    }


    public function results(){
        return $this->_results;
    }

    public function first(){
        return $this->results()[0];
    }

    public function count(){
        return $this->_count;
    }

    public function error(){
        return $this->_error;
    }

    public function lastInsertId(){
         return $this->_pdo->lastInsertId();
    }

    public static function version(){
        echo "DB  Version of Gkiokan.NET<br><br>";
    }

 }
