<?php/*
      * Development Enviroment 
      */

    $this->template->title('Vars Debugging');
    $this->template->set('description', 'Check out avaible vars.');
?>
<?php get_header($this); ?>

    <h1>Development Enviroment</h1>
    <br>
    <?php debug($this); ?>
    
<?php template::footer(); ?>