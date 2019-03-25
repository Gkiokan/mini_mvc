<?php

    $this->template->title("Register User Account - Step 2 | Gkiokan.NET");
    $this->template->set('description', 'Verify and fill Account Information');
    $this->template->set('keywords', '');
    
    template::header($this);
    
?>
    <h1>Register Account - Step 2</h1>
    <br>
    <?php
    if(session::exists('register_step_2'))
    echo session::flash('register_step_2');
    
    
    template::showErrors($this->errors);
    
    ?>
    
    <br>
    <br>
    Here will be some additional User Informations Fields.<br>
    Fill thoose in, and get a full stage account, to access all<br>
    the Projects.<br>
    <br>
    Attention: Only Fullyfilled Accounts may access to Projects and
    gain a License Key for the choosen Projects for free.<br>
    <br>
    Thanks,<br>
    Gkiokan.NET<br>
    
    
    
    <?php template::footer() ?>