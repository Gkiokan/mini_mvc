<?php
/*
 * Project: DataBase as Service (dbas)
 * Author: Gkiokan Sali
 * URI: www.gkiokan.net/project/dbas
 * Date: 30.12.2014 - reCreation
 * Lizens: Gkiokan.NET
 * Comments:
 * This is the new core of DBAS.
 * DBAS is known as DataBase as Service.
 * My Project is about to Organize your DataBase with your own API
 * which works in assoziation with a uniq token key for each user.
 * Simply use DBAS for Web, App, Game, Desktop applications data base
 * or whatever else you will need a DataBase for.
 *
 */

class dbas extends Controller {

    public $version = "DBAS - DataBase as Service v0.1.0 | Gkiokan.NET ";
    public $seperator = "|";
    public $split = ":";
    public $data = array();
    public $config = array('datbase_prefix'=>'gkiokan_table_');
    private $_db_config = 'dbas_config';
    private $_db;
    private $_fields = array();
    private $_found_fields = array();

    public function __construct(){
        show_all_errors();

        $this->_db = db_dbas::getInstance();

        $this->push_fields('id', 'int', '255');
        $this->push_fields('beschreibung', 'text', 'null');
        $this->push_fields('einkommen', 'text', 'null');
        $this->push_fields('ausgaben', 'text', 'null');
        $this->push_fields('username', 'varchar', '200');
    }

    private function push_fields($field, $typ, $length){
        $this->_fields[] = array('field'=>$field, 'typ'=>$typ, 'length'=>$length);
    }

    private function push_found($field){
        $this->_found_fields[] = $field;
    }

    private function getFields(){
        return $this->_fields;
    }

    private function getInput(){
      return $this->_data_input;
    }

    private function select_only_avaible_fields($input=null){
        $fields = $this->getFields();
        $found = array();
        $where = array();
        $input = !$input ? $this->_data_input : $input;

        foreach($fields as $key=>$val){
          $field = $val['field'];
          if(array_key_exists($field, $input)):
            $found[$field] = null;
            $data = $input[$field];
            if(!empty($data) && isset($data)) $where[$field] = $data;
          endif;
        }

        $this->_data_found = $found;
        $this->_data_where = $where;
        return $found;
    }

    private function build_query($found=array(), $table=null, $where=array()){
        $count = count($found); $x=1;
        $build_query = "SELECT ";
        foreach($found as $key=>$val){
          $build_query .= "`$key`";
          $build_query .= $x<$count ? ", " : "";
          $x++;
        }
        $build_query .= " FROM `{$table}` ";

        $count = count($where); $x=1;
        if($count):
          $build_query .= "WHERE ";
          foreach($where as $key=>$val){
            $build_query .= "`$key`='$val' ";
            $build_query .= $x<$count ? "AND " : "";
            $x++;
          }
        endif;
        return $build_query;
    }

    public function debug($input=null, $table=null, $token=null){
      $this->_data_input = $this->getKeyValue($this->split($input));
      $this->_data_table = $table;
      $this->_data_post  = $this->select_only_avaible_fields($_POST);
      $this->_data_post_string = $this->getKeyValue($this->split($_POST['data']));

      $post  = $this->_data_post;
      $post_string = $this->_data_post_string;
      $found = $this->_data_found;
      $where = $this->_data_where;

      $sql = $this->build_query($found, $table, $where);

      debug($sql);
    }

    public function fields($key=null, $value=null, $token=null){
      if($key && $value):
        switch($key):
          case 'key':
            $field = 'api_key';
          break;
          case 'table':
            $field = 'table_name';
          break;
          default:
            $field = 'api_key';
          break;
        endswitch;
        $config = $this->_db->get($this->_db_config, array($field,'=', $value));
        if($config->count()):
          $config = $config->first();
          $table_config = json_decode($config->table_config);

          $this->output($table_config);

        else:
          $this->output(array('error'=>"No Valid Database found"));
        endif;
      else:
        $this->output(array('error'=>"No Valid values selected"));
      endif;
    }

    public function index(){
        echo "<style>.dbas { font-family:'monospace'; font-size:14px; }</style>";
        echo "<div class='dbas'>";
        echo "Instruction to DBAS";
        echo "<br>";
        echo "Split Charakter: | <br>";
        echo "Legal Operators: < > = <br>";
        echo "<br>";
        echo "<b>request Field List</b><br>";
        echo "/fields/table/value - get Field List by Table Name <br>";
        echo "/fields/key/value - get Field List by API Key <br>";
        echo "<br>";
        echo "<br>";
        echo "<b>request Data URL Structure </b><br>";
        echo "/request/field:value|field/table/token/options - field:value set a  value to be equal<br>";
        echo "<br>";
        echo "<br>";
        echo "<b>Input Data URL Structure </b><br>";
        echo "/insert/field:value/table";
        echo "<br>";
        echo "<br>";
        echo "
        <b>Updates</b><br>
        <pre>
        30.01.2015 | request, field list function extended and structure rebuild.
        30.12.2014 | ReQuest & Insert Function done
        29.12.2014 | Core Build of DBaS new Structure
        </pre>";
        echo "</div>";
    }

    public function get($input=null, $table=null, $where=null, $token=null){
        $this->input = $this->split($input);
        $this->table = $this->getTable($table);
        $this->where = $this->split($where);

        debug($this->input);
        debug($this->table);
        debug($this->where);
    }

    public function request($input=null, $table=null, $token=null){
        $this->_data_input = $this->getKeyValue($this->split($input));
        $this->_data_table = $this->getTable($table);
        $this->_data_post  = $this->select_only_avaible_fields($_POST);
        //$this->_data_post_string = $this->getKeyValue($this->split($_POST['data']));

        $post  = $this->_data_post;
        //$post_string = $this->_data_post_string;
        $found = $this->_data_found;
        $where = $this->_data_where;
        $table = $this->_data_table;

        $sql = $this->build_query($found, $table, $where);

        $results = $this->_db->query($sql)->results();

        $this->output($results);
    }



    public function insert($input=null, $table=null, $token=null){
        $this->_data_input = $this->getKeyValue($this->split($input));
        $this->_data_table = $this->getTable($table);
        $this->_data_post  = $this->select_only_avaible_fields($_POST);

        $found = $this->_data_found;
        $where = $this->_data_where;
        $table = $this->_data_table;

        if($this->_db->insert($table, $where)):
            $where['success'] = "Insert has been donen";
            $this->output($where);
        else:
            $this->output(array('error'=>"Insert has been failed."));
        endif;

    }

    public function find(){
        if(!empty($this->data)):
            $sql="";
            $count = count($this->data);
            $x=1;
            foreach($this->data as $key=>$val){
                $sql.= "`$key`";
                $sql.= $x<$count ? "," : "";
                $x++;
            }
            $this->findSQL = "SELECT {$sql} FROM `{$this->table}`";

            if(count($this->where)==3):
                $field = isset($this->where[0]) ? $this->where[0] : null;
                $operator = isset($this->where[1]) ? $this->where[1] : null;
                $value = isset($this->where[2]) ? $this->where[2] : null;
                if($field && $operator && $value): $this->findSQL.= " WHERE `{$field}` {$operator} '{$value}'"; endif;
            elseif(!empty($this->where[0])):
                $this->findSQL.= " {$this->where[0]}";
            endif;

            return $this->findSQL;
        else:
            return "Data is Empty";
        endif;
    }



    public function split($i){
        return isset($i) ? explode($this->seperator, $i) : false;
    }

    public function getKeyValue($i){
        $return = array();
        if(is_array($i)):
            foreach($i as $key=>$data):
                $temp = array();
                $value = explode($this->split, $data);
                $key = isset($value[0]) ? $value[0] : false;
                $val = isset($value[1]) ? $value[1] : "";
                if($key):
                    $temp[$key] = $val;
                    $return += $temp;
                endif;
            endforeach;
        else:
            $return = "Input is not a Valid Array";
        endif;
        return $return;
    }

    public function token($t){
        if($t) return true;
    }

    public function output($o){ echo json_encode($o); }

    public function getTable($table){ return $this->config['datbase_prefix'].$table; }


}

?>
