<?php
    $this->template->title("Kategorie Erstellen | Berichtsheft System | Gkiokan.NET");
    $this->template->set('description', 'Erstelle eine neue Kategorie');
    $this->template->set('keywords', '');

	 template::header($this);

	 $days = $data->days;
	 $user = $data->user->data();
	 $status = $this->bhs->parseOption($data->category_status, input::get('status'));
?>

	<h1>Kategorie erstellen</h1>
	 <br>
	 <br>
	 <?php template::showErrors($this->errors); ?>
	 <form action="" method='post'>		  
	    <div class='row'>
		<div class='col-xs-12 col-sm-7'>
		    <h3>Neue Kategorie erstellen</h3>
		    
		    <div class='field form-group'>
			     <label class='control-label'>Kategorie Name</label>
			     <input class='form-control' type='text' name='title' value='<?php echo input::get('title'); ?>' placeholder='Kategorie Name'>
		    </div>
		    
		    <div class='field form-group'>
			     <label class='control-label'>Kategorie Optionen</label>
			     <textarea class='form-control' name='options' placeholder='Options beta in JSON' rows=4><?php echo input::get('options'); ?></textarea>
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
	    <input type='hidden' name='token' value='<?php echo token::generate(); ?>'>	    
	 </form>

<?php template::footer(); ?>
