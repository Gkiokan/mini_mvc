<?php
/*
 * Project View.
 *
 */

    $this->template->title('q Generator | Gkiokan.NET');
    $this->template->set('description', 'q Generator is a little JS field, to get your unique Hash');
    template::header($this); ?>
    
    <style>
        .project {}
        .project_box { min-height:140px; }
    </style>
    
    <h1>q Generator</h1>
    <br>
    
    <?php echo file_get_contents('http://svr.gkiokan.net/q_generator/'); ?>
    
    
    
<?php template::footer(); ?>