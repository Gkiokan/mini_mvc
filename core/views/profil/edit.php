<?php

    $this->template->title("Edit your Account | Gkiokan.NET");
    $this->template->set('description', 'Edit your account Information');
    $this->template->set('keywords', '');

    template::header($this);

?>
    <h1>Edit Account</h1>
    <br>
    <?php
    if(session::exists('account_edit_message'))
    echo session::flash('account_edit_message');

    template::showErrors($this->errors);

    $logged = $this->user->isLoggedIn();
    $user = $this->user->data();
    $percentage = $this->user->getPercentage();

    ?>

    <script>
      var head = document.getElementsByTagName('head')[0];
      var css  = document.createElement('link');
      css.type='text/css';
      css.rel='stylesheet';
      css.href='<? get_base_url();?>/assets/css/gkiokan_progress_circle.css';
      head.appendChild(css);
    </script>

    <div class='row'>
      <div class='col-xs-12 col-sm-6 col-md-7'>
        <h3>Profil Overview</h3>
        <br>
        <div class='user_profile_percentage'>
          <div class='progress-radial progress-<? echo $percentage;?>'>
            <div class='overlay'><? echo $percentage;?> %</div>
          </div>
        </div>


        <p class='bg-info text-info'><span class='glyphicon glyphicon-info-sign'></span> Nothing to show for now</p>
        <p class='bg-success text-success'><span class='glyphicon glyphicon-ok-circle'></span> Beta User Account is okay - for now - no validate</p>

      </div>
      <div class='col-xs-12 col-sm-6 col-md-5'>
        <form action="" method="post" class='form-horizontal' role='form'>
          <h3>Edit Profil Information</h3>
          <div class='field'>
            <label for='username' class='control-label'>Username</label>
            <input type='text' name='username' id='username' value='<?php echo $user->username ?>' class='form-control'>
          </div>

          <div class='field'>
            <label for='email' class='control-label'>Email</label>
            <input type='text' name='email' id='email' value='<?php echo $user->email?>' class='form-control'>
          </div>
          <br>
          <div class='field'>
            <label for='vorname' class='control-label'>First Name</label>
            <input type='text' name='vorname' id='vorname' value='<?php echo $user->vorname?>' class='form-control'>
          </div>
          <div class='field'>
            <label for='name' class='control-label'>Last Name</label>
            <input type='text' name='name' id='name' value='<?php echo $user->name?>' class='form-control'>
          </div>
          <div class='field'>
            <label for='bday' class='control-label'>Birthday</label>
            <input type='text' name='bday' id='bday' value='<?php echo $user->bday?>' class='form-control'>
          </div>
          <br>
          <div class='field'>
            <label for='adresse' class='control-label'>Adress</label>
            <input type='text' name='adresse' id='adresse' value='<?php echo $user->adresse?>' class='form-control'>
          </div>
          <div class='field'>
            <label for='plz' class='control-label'>PLZ</label>
            <input type='text' name='plz' id='plz' value='<?php echo $user->plz?>' class='form-control' maxlength='6'>
          </div>
          <div class='field'>
            <label for='stadt' class='control-label'>City / Location</label>
            <input type='text' name='stadt' id='stadt' value='<?php echo $user->stadt?>' class='form-control'>
          </div>
          <br>
          <br>
          <h3>Change Password</h3>
          <div class='field'>
            <label for='password' class='control-label'>Password</label>
            <input type='password' name='password' id='password' value='' placeholder='Old Password' class='form-control'>
          </div>
          <div class='field'>
            <label for='password_new' class='control-label'>New Password</label>
            <input type='password' name='password_new' id='password_new' value='' placeholder='New Password goes here' class='form-control'>
          </div>
          <div class='field'>
            <label for='password_again' class='control-label'>Password again</label>
            <input type='password' name='password_again' id='password_again' value='' placeholder='Repeat your new Password here' class='form-control'>
          </div>

          <br><br>
          <input type='hidden' name='token' value='<?php echo token::generate()?>'>
          <input type='submit' class='btn btn-primary' value='Save my Profile'>
       </form>
      </div>
    </div>

    <?php template::footer() ?>
