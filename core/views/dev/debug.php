<?php /*
       * Debug View
       */
    
    $this->template->title('Hello sweet debug');
    $this->template->set('keywords','This is the Debug.');    
    $this->template->set('description', 'GkiokanNET Developers Enviroment only for testing purposes!');

?>
<?php   template::header($this);    
        //get_header($this);
?>       
    <h1>Debug</h1>
    <br>
    <?php

    db::version();
    
    $insert = db::getInstance()->insert('TestTable', array(
                                    'name' => 'New User',
                                    'number' => 2,
                                    'status'    => 'newUser@com.de'
                                                    ));
    
    
    $update = db::getInstance()->update('TestTable', 2, array(
                                    'name' => 'New User XY',
                                    'number' => 5,
                                    'status'    => 'changedUsa@com.de'
                                                    ));
    
    
    if($update){
        echo "<div class='alert alert-success'>Update Done</div>";
    }
    
    if($insert){
        echo "<div class='alert alert-success'>Insert Done 2 </div>";
    }
    
    //$users = db::getInstance()->query("SELECT username, vorname, stadt FROM users");
    //$users = db::getInstance()->get('users', array('username', '=', 'Gkiokan'));
    //$users = db::getInstance()->action('SELECT username, vorname, stadt', 'users', array('username', '=', 'Gkiokan') );
    /*
    if(!$users->count())
        echo "ERROR";
    else
        echo "OK!";
        
    foreach($users->results() as $user){
        debug($user);
    }
    */
    
    //debug($this);    
    ?>
    
<?php template::footer(); ?>
    