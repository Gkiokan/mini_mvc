<?php

    $this->template->title('User Profile | Gkiokan.NET');
    
    template::header($this);
    
    $user = $this->user->data()->username;
    ?>
    <h1>User Profile <? echo $user ?></h1>
    <br>
    <?php
    
    
    //$user_found = db::getInstance()->get('users', array('username', '=', $user));
    $user_found = db::getInstance()->action('SELECT username, vorname, name, stadt, bday', 'users', array('username', '=', $user));
    
    if($user_found->count()>0)
        echo "<label class='label label-success'>User $user found!</label>";
    else
        echo "<label class='label label-danger'>User $user NOT found!</label>";
    
    echo "<br><br><br>";
    if($user_found->count()>0)
        foreach($user_found->first() as $key=>$val){
            echo "$key : $val <br>";
        }
        
    
    ?>
    
    
    
<?php template::footer(); ?>