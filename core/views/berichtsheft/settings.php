<?php
    $this->template->title("Einstellungen & Übersicht | Berichtsheft System | Gkiokan.NET");
    $this->template->set('description', 'Einstellungen & Übersicht ');
    $this->template->set('keywords', '');
	$this->template->view = "header";
	template::header($this);

	$user = $this->user->data();
	$days = $this->days;

	//$entries = $this->_db->get('berichtsheft_entrys', array('user_id','=',$user->id))->results();;
	$entries = $this->_db->query('select * from berichtsheft_entrys where user_id = ? order by id DESC', array($user->id))->results();
?>
    <h1>Berichtsheft System - Einstellungen & Übersicht</h1>
    <br>
    <div class='row'>
	<div class='col-xs-12 col-sm-6'>
	    <h2>Einstellungen</h2>
	
	</div>
	<div class='col-xs-12 col-sm-6'>
	    <h2>Übersicht der letzten Einträge</h2>
	    <br><br>
	    <?php
	    for($x=0;$x<5;$x++){
		$entry = $entries[$x];
		if($entry):
		echo "<div class='entry'>";
			      echo "<div class='title'><h4>$entry->title</h4></div>";
			      echo "<div class='options'>$entry->week {$days[$entry->day]} $entry->year</div>";
		echo "</div>";
		endif;
	    }
	    ?>
	</div>
    </div>


<?php template::footer(); ?>
