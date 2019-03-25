<?php

    $this->template->title("Register User Account | Gkiokan.NET");
    $this->template->set('description', 'Get your free Account on Gkiokan.NET');
    $this->template->set('keywords', '');
    
    template::header($this);
    
?>
    <h1>Register Account - Step 1</h1>
    <br>
    <?php
    if(session::exists('success'))
    echo session::flash('success');
    
    ?>
    
    <div class='row'>
    <div class='col-xs-12 col-sm-7'>
        <h3>Account Register Information</h3>
        <br>
        Here is your startpoint for an Account on Gkiokan.NET.<br>
        <br>
        You'll be able to login and get use of the Projects and Downloads.
        You can access your own Data later on with your specific Lizenz Key
        which is completly Unique to any user. You can also Port your Data
        from other Platforms or to other Platforms if you want.
        <br>
        <br>
        To talk about Security it's really Important, that your Data is
        secured as well. Gkiokan.NET MVC provides multiple decrypt functionality
        which works flexible and dynamic. It's ment to hash your data on each
        time you login or interact with your Account randomly. So you can say,
        it's Kinda 3 way hashing all your Data. Think that is 2x more then on usual
        Platforms.
        <br>
        <br>
        Please pay attention, this is only the first Beta user Account Version
        which will be extended soon with more Profil and Security Options.
        <br>
        <br>
        Register is also free and your Data isn't avaible for 3rd Parties.
        <br>
    </div>    
    <div class='col-xs-12 col-sm-5'>
        <h3>Fill in your Account</h3>
        <br>
            <?php template::showErrors($this->errors); if($this->errors) echo "<br>"; ?>
        <form  method='post' style='font-family:sans-serif'>
            <div class='field form-group'>
                <label for='username' class='control-label'>Username</label>
                <input type='text' id='username' name='username' value='<?php echo Input::get('username');?>' class='form-control'>
            </div>
            
            <div class='field form-group'>
                <label for='email' class='control-label'>Email</label>
                <input type='text' id='email' name='email' value='<?php echo Input::get('email'); ?>' class='form-control'>
            </div>
            
            <div class='field form-group'>
                <label for='password' class='control-label'>Password</label>
                <input type='password' id='password' name='password' value='' class='form-control'>
            </div>
            
            <div class='field form-group'>
                <label for='password_repeat' class='control-label'>Password repeat</label>
                <input type='password' id='password_repeat' name='password_repeat' value='' class='form-control'>
            </div>
            <br>
                <br>
            <input type='hidden' name='token' value='<?php echo token::generate(); ?>'>
            <input type='submit' name='register' value='Next Step'>
        </form>
    </div>
    </div>
        
    <?php template::footer(); ?>