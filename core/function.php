<?php
/*
  File: Function.php
  Comments: -//-

*/


  function get_header($data=array()){
      include('template/header.php');
  }

  function get_footer(){
      include('template/footer.php');
  }

  function check_file($in){
    if(file_exists('view/'.$in.'.php')) return true;
    return false;
  }

  function debug($a){ echo "<pre>"; print_r($a); echo "</pre>"; }

  function isset_and_get($a, $b){ return isset($a[$b]) ? $a[$b] : false; }

  function show_all_errors(){
      error_reporting(E_ALL);
      ini_set('display_errors','On');
  }

  //show_all_errors();
