<?php
    $this->template->title("Eintrag ansehen | Berichtsheft System | Gkiokan.NET");
    $this->template->set('description', 'Eintragsansicht');
    $this->template->set('keywords', '');

	 template::header($this);

	 $days = $data->days;
	 $entry = $data->bhs->data();
	 $array_year = $data->bhs->parseOption($data->years, $entry->year);
	 $array_week = $data->bhs->parseOption($data->weeks, $entry->week);
	 $array_week_day = $data->bhs->parseOption($days, $entry->day);
	 $array_category = $data->bhs->parseOptionObject($data->bhs->getCategories(), $entry->category);
?>

	 <style>

	 </style>

	 <h1>Eintrag editieren</h1>
	 <br>
	 <?php template::showErrors($this->errors);?>

	 <form action="" method='post'>
	 <div class='row'>
		  <div class='col-xs-12 col-sm-8'>
				<h2>Inhalt</h2>
				<div class='field form-group'>
					 <label for='title'>Titel</label>
					 <input type='text' id='title' name='title' class='form-control' value='<?php echo $entry->title; ?>'>
				</div>
				<br>
				<div class='field form-group'>
					 <label for='content'>Inhalt</label>
					 <textarea name='content' id='content' class='form-control' rows=10><?php echo $entry->content; ?></textarea>
				</div>

		  </div>
		  <div class='col-xs-12 col-sm-4'>
				<h2>Details</h2>
				<div class='field form-group'>
					<label for='category'>Kategorie</label>
					<select name='category' class='form-control' id='category'><?php echo $array_category ?></select>
				</div>
				
				<div class='field form-group'>
					 <label for='week'>Kalenderwoche</label>
					 <select name='week' class='form-control'><?php echo $array_week; ?></select>
				</div>
				<div class='field form-group'>
					 <label for='week_day'>Tag</label>
					 <select name='day' class='form-control'><?php echo $array_week_day; ?></select>
				</div>
				<div class='field form-group'>
					 <label for='year'>Jahr</label>
					 <select name='year' class='form-control'><?php echo $array_year; ?></select>
				</div>
				<br>
				<br>
				<div class='btn-group btn-group-fullsize'>
					 <input type='submit' value='Eintrag speichern' class='btn btn-primary'>
				</div>
				<br>
				<br>
		  </div>
	 </div>
	 <input type='hidden' name='entry_id' value='<?php echo $entry->id ?>'>
	 <input type='hidden' name='token' value='<?php echo token::generate(); ?>'>
	 </form>


<?php template::footer(); ?>
