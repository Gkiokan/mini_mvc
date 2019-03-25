<?php

  $this->template->title('Manage Post Categories | Gkiokan.NET');

  template::header($this);

?>
  <h2>Add a new Category</h2>
  <br><br>
  <?php
  template::showErrors($this->errors);
  echo session::flash('newPostCategory');

  ?>

  <form method='post'>
  <div class='row'>
  <div class='col-xs-12 col-sm-8'>
  <h3>Category Data</h3>
    <div class='form-group'>
        <label class='control-label'>Category Title</label>
        <input type='text' class='form-control' name='name' value='<?php echo input::get('name');?>' >
    </div>
    <div class='form-group'>
        <label class='control-label'>Category Description</label>
        <textarea class='form-control' name='description' rows=3><?php echo input::get('description');?></textarea>
    </div>
  </div>
  <div class='col-xs-12 col-sm-4'>
        <h3>Category Details</h3>
        <label class='control-label'>Category Share Settings</label>

        <div class='checkbox'>
          <label><input type='checkbox' name='google' <?php echo input::get('google') ? 'checked' : '';?>> Share on Google</label>
        </div>
        <div class='checkbox'>
          <label><input type='checkbox' name='twitter' <?php echo input::get('twitter') ? 'checked' : '';?>> Share on Twitter</label>
        </div>
        <div class='checkbox'>
          <label><input type='checkbox' name='facebook' <?php echo input::get('facebook') ? 'checked' : '';?>> Share on Facebook</label>
        </div>

        <div class='form-group'>
          <select class='form-control' name='status'>
            <?php $this->post->postStatusOptions(input::get('status')); ?>
          </select>
        </div>

        <input type='submit' class='text-success' value='Create Post Category'>
        <input type='hidden' name='token' value='<?php echo token::generate();?>'>
  </div>
  </div>
  </form>






<?
  template::footer();
?>
