<?php

    $this->template->title("LogIn | Gkiokan.NET");
    $this->template->set('description', 'LogIn to your Gkiokan.NET Account.');
    $this->template->set('keywords', '');
    
    template::header($this);
    
?>
    <h1>LogIn</h1>
    <br>
    <?php
    if(session::exists('access_error'))
    echo session::flash('access_error');
    
    template::showErrors($this->errors);
    
    ?>
    
    <div class='row'>
    <div class='col-xs-12 col-sm-5'>
        <form action='' class='form-horizontal' method='post' style='font-family:sans-serif; color: #555;'>
            <div class='field '>
                <label for='username' class='control-label'>Username or Email</label>
                <input type='text' id='username' name='username' value='<?php echo input::get('username');?>' class='form-control'>
            </div>
            
            <div class='field'>
                <label for='password'>Password</label>
                <input type='password' id='password' name='password' value='' class='form-control'>
            </div>
            
            <div class='field'>
                <label for='remember'>
                    <input type='checkbox' name='remember' id='remember'> Remember me
                </label>            
            </div>
            <input type='hidden' name='token' value='<?php echo token::generate(); ?>'>
            <input type='submit' name='register' value='LogIn'>
        </form>
    </div>
    <div class='col-xs-12 col-sm-7'>
        
        
    </div>
    </div>
    
    <?php template::footer(); ?>