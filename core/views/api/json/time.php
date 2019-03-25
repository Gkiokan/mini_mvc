<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 10.11.2014
       * * * * * * * * * * * * */

    $time = time();
    $full_time = date('d.m.Y H:i:s', $time);
    $full_date = date('d.m.Y', $time);    
    
    $final = array('full_time'=>$full_time, 'full_date'=>$full_date, 'time'=>$time);
    $final = json_encode($final);
    
    //header('Content-type: application/json');
    echo $final;
?>