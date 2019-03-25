<?php

  $this->template->title('Manage Post Categories | Gkiokan.NET');

  template::header($this);

?>
  <h2>Edit Post Category</h2>
  <br><br>
  <?php
  template::showErrors($this->errors);
  echo session::flash('editPostCategory');

  $category = $this->post->getCategory();
  $options = json_decode($category->options);

  ?>

  <form method='post'>
  <div class='row'>
  <div class='col-xs-12 col-sm-8'>
  <h3>Category Data</h3>
    <div class='form-group'>
        <label class='control-label'>Category Title</label>
        <input type='text' class='form-control' name='name' value='<?php echo $category->name;?>' >
    </div>
    <div class='form-group'>
        <label class='control-label'>Category Description</label>
        <textarea class='form-control' name='description' rows=3><?php echo $category->description;?></textarea>
    </div>
  </div>
  <div class='col-xs-12 col-sm-4'>
        <h3>Category Details</h3>
        <label class='control-label'>Category Share Settings</label>

        <div class='checkbox'>
          <label><input type='checkbox' name='google' <?php echo $options->google ? 'checked' : '';?>> Share on Google</label>
        </div>
        <div class='checkbox'>
          <label><input type='checkbox' name='twitter' <?php echo $options->twitter ? 'checked' : '';?>> Share on Twitter</label>
        </div>
        <div class='checkbox'>
          <label><input type='checkbox' name='facebook' <?php echo $options->facebook ? 'checked' : '';?>> Share on Facebook</label>
        </div>

        <div class='form-group'>
          <select class='form-control' name='status'>
            <?php $this->post->postStatusOptions($category->status); ?>
          </select>
        </div>

        <input type='submit' class='text-success' value='Update Post Category'>
        <input type='hidden' name='token' value='<?php echo token::generate();?>'>
  </div>
  </div>
  </form>






<?
  template::footer();
?>
