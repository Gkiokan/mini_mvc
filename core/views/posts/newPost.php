<?php

  $this->template->title('Manage Post Categories | Gkiokan.NET');

  template::header($this);

?>
  <h2>new Post</h2>
  <br><br>
  <?php
      template::showErrors($this->errors);
      echo session::flash('newPost');
      show_all_errors();

      $allCategories = $this->post->allCategories();
      $selectCategory = $this->post->parseOptionObject($allCategories, input::get('category'));
  ?>

  <form method='post'>
  <div class='row'>
  <div class='col-xs-12 col-sm-8'>
  <h3>Create new Post on Gkiokan.NET</h3>
    <div class='form-group'>
        <label class='control-label'>Post Title</label>
        <input type='text' class='form-control' name='name' value='<?php echo input::get('title');?>' >
    </div>
    <div class='form-group'>
        <label class='control-label'>Post Content</label>
        <textarea class='form-control' name='description' rows=15><?php echo input::get('content');?></textarea>
    </div>
  </div>
  <div class='col-xs-12 col-sm-4'>
        <h3>Post Details</h3>
        <label class='control-label'>Select Post Category</label>
        <div class='form-group'>
          <select class='form-control' name='category'>
            <?php echo $selectCategory; ?>
          </select>
        </div>

        <input type='submit' class='text-success' value='Create Post'>
        <input type='hidden' name='token' value='<?php echo token::generate();?>'>
  </div>
  </div>
  </form>






<?
  template::footer();
?>
