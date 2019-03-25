<?php

    $this->template->title("Account Settings | Gkiokan.NET");
    $this->template->set('description', 'Your account Information');
    $this->template->set('keywords', '');

    template::header($this);

?>
    <h1>Account Settings</h1>
    <br>
    <?php
    if(session::exists('account_settings'))
    echo session::flash('account_settings');


    template::showErrors($this->errors);

    $logged = $this->user->isLoggedIn();
    $user = $this->user->data();
    ?>

    <br>
    User Status is loggedIn: <?php echo $logged; ?><br>
    Username: <?php echo $user->username; ?><br>
    Email: <?php echo $user->email; ?><br>

    <br>

    <div class='row'>
        <div class='col-xs-12 co-sm-6 col-md-3'>
            <a href='/berichtsheft'>
            <div class='entry' style='background: url(https://www.muenchen.ihk.de/de/bildung/Bilder/berichtsheft-artikel.jpg) center center no-repeat; background-size:cover'>
                <div class='title'><h4>Berichtsheft System</h4></div>
            </div>
            </a>
        </div>
    </div>


    <a href='/logout'>Logout</a><br>


    <?php template::footer() ?>
