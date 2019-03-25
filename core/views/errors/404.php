<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net/welcome
       * * * * * * * * * * * * */
    header("HTTP/1.0 404 Not Found");
    
    $this->template->title("Error 404 | Gkiokan.NET");
    $this->template->set('description', 'The page you are looking for was not found!');
    $this->template->set('keywords', '');
?>  

<?php template::header($this); ?>

    <h1>Gkiokan.NET core Error report</h1>
    <br>
    <h2>Error 404</h2>
    <p>
        Dear User,<br>
        There went something wrong!<br>
        I'm sorry, your requested Page doesn't exist or has been deleted.<br>
        <br>
        <br>
        <a href='<?php echo get_base_url() ?>' class='label label-success'><span class='fa fa-home'></span> Back to Home </a>
        <br><br>
    </p>

<?php template::footer(); ?>
