<?php
    $this->template->title("Kategorien Verwalten | Berichtsheft System | Gkiokan.NET");
    $this->template->set('description', 'Verwalte deine Kategorien nach belieben');
    $this->template->set('keywords', '');

	 template::header($this);

	 $days = $data->days;
	 $user = $data->user->data();
	 $cat  = $data->category;
	 $status = $this->bhs->parseOption($data->category_status, $cat->status);
?>

	<h1>Kategorie bearbeiten</h1>
	 <br>
	 <br>
	 <?php template::showErrors($this->errors);
		   echo session::flash('category_update');
	 ?>
	 <form action="" method='post'>		  
	    <div class='row'>
		<div class='col-xs-12 col-sm-7'>
		    <h3>Kategorie Details</h3>
		    
		    <div class='field form-group'>
			     <label class='control-label'>Kategorie Name</label>
			     <input class='form-control' type='text' name='title' value='<?php echo $cat->title?>' placeholder='Kategorie Name'>
		    </div>
		    
		    <div class='field form-group'>
			     <label class='control-label'>Kategorie Optionen</label>
			     <textarea class='form-control' name='options' placeholder='Options beta in JSON' rows=4><?php echo $cat->options ?></textarea>
		    </div>					 
		    
		</div>
		<div class='col-xw-12 col-sm-5'>
		    <h3>Optionen</h3>
		    <div class='field form-group'>
			     <label class='control-label'>Kategorie Status</label>
			     <select name='status' class='form-control'><?php echo $status; ?></select>
		    </div>
		    <br><br>
		    <div class='field form-group'>
			     <input type='submit' value='Kategorie speichern'>
		    </div>
		    
		</div>
	    </div>
	    <input type='hidden' name='cat_id' value='<?php echo $cat->id ?>'>
	    <input type='hidden' name='token' value='<?php echo token::generate(); ?>'>	    
	 </form>

<?php template::footer(); ?>
