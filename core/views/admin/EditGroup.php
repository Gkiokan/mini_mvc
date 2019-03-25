<?php
/*
 *
 */

    $group = $this->admin->getGroup($this->groupID);
?>

<?php   template::header($this); ?>

    <h1>Edit Group</h1>
    <br>
    <?php template::showErrors($this->errors);
        echo session::flash('create_group_message');
    ?>
    <form method='post'>
    <div class='row'>
        <div class='col-xs-12 col-sm-8'>
            <h3>Details</h3>
            <div class='form-group'>
                <input type='text' name='name' class='form-control' value='<?php echo $group->name; ?>' placeholder='Group Name'>
            </div>
            <div class='form-group'>
                <textarea name='options' class='form-control' placeholder='Options' rows='5'><?php echo $group->options; ?></textarea>
            </div>
        </div>
        <div class='col-xs-12 col-sm-4'>
            <h3>Submit</h3>
            <input type='hidden' name='token' value='<?php echo token::generate(); ?>'>
            <input type='submit' value='Save it!'>
        </div>
    </div>
    </form>
    
<?php   template::footer(); ?>