<?php
    $this->template->title("Alle meine Eintrag ansehen | Berichtsheft System | Gkiokan.NET");
    $this->template->set('description', 'Alle deine Einträge');
    $this->template->set('keywords', '');
	template::header($this);
	
	$days = $data->days;
	$user = $data->user->data();
?>

	 <h1>Verfügbare Einträge</h1>
	 <br>
	 <br>
	 <?php template::showErrors($this->errors);?>
	 <?php
	    //show_all_errors();
	    
	    $e = $this->bhs->get_all_entries();
	 ?>
	<div class='row'>
	    <div class='col-xs-12 col-sm-4'>
		<h4>Information</h4>
		<?php
		    echo "<div class='label-control'>Username: $user->username </div>";
		    echo "<div class='label-control'>$user->vorname $user->name</div>";
		    echo "<div class='label-control'>$user->adresse </div>";
		    echo "<div class='label-control'>$user->plz $user->stadt</div>";
		    echo "<br>";
		    echo "<div class='label-control'>Gesamt {$e['info']['total']} Einträge</div>";		    
		?>
		<br>
		<div class='btn-group options'>
		    <div class='btn btn-sm' data-option='entry_table'><span class='glyphicon glyphicon-indent-left'></span> Wochen als Tabelle </div>
		    <div class='btn btn-sm' data-option='entry_cachel'><span class='glyphicon glyphicon-th-large'></span> Wochen als Kachel </div>
		</div>
		<div class='btn-group options'>
		    <div class='btn btn-sm' data-option='min_all'><span class='glyphicon glyphicon-collapse-up'></span> Alle Einträge minimieren</div>
		</div>
		
	    </div>
	    <div class='col-xs-12 col-sm-8'>
		<h4>DATA Options</h4>
		Here is your JSON!
		<div style='max-height:150px; display: block; overflow-y: auto; '><?php debug(json_encode($e['content'])); ?></div>
	    </div>	
	</div>
	<br><br>
	    <?php 
		$week_count = 0;
		//echo "<span class='linkTo'><a href='/berichtsheft/eintrag/$entry->id' class='btn btn-xs btn-info'><span class='glyphicon glyphicon-eye-open'></span> ansehen</a></span>";
		//echo "<span class='linkTo'><a href='/berichtsheft/edit/$entry->id' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-pencil'></span> edit</a></span>";			
		
		// Build Panel Group
		function build_panel_header($in, $name="", $open=null, $class=null, $options=null, $max=null){
		    $open = $open ? 'in' : '';
		    $class  = $class ? $class : "panel panel-default";
		    $max = $max ? "<div class='btn btn-sm' data-option='full' data-target='$in'><span class='glyphicon glyphicon-resize-full'></span></div>" : "";
		    // <div class='btn btn-sm' data-option='toggle' data-target='$in'><span class='glyphicon glyphicon-chevron-down'></span></div>
		    $options = $options ? "<div class='options btn-group'>$max</div>" : "";
		    echo "<div class='$class animate' data-target='$in'>";
		    echo "<div class='panel-heading' role='tab' id='head_$in'><a data-toggle='collapse' xdata-parent='#accordion' href='#$in' aria-expanded='true' aria-controls='head_$in'><h4 class='panel-title'>$name</h4></a></div>";			  
		    echo $options;
		    echo "<div id='$in' class='panel-collapse collapse $open' role='tabpanel' aria-labelledby='head_$in'>
			  <div class='panel-body'>";		    
		}
		function build_panel_footer(){ echo "</div></div></div>"; }		
		
		// Create Panel group
		echo "<div class='panel-group berichtsheft-group' id='accordion' role='tablist' aria-multiselectable='true'>";
		foreach($e['content'] as $year=>$weeks_all):
		build_panel_header($year, "Jahr $year", true);
		    foreach($weeks_all as $week=>$days_all):
		    build_panel_header($year.$week, "Kalenderwoche $week", null, "my_entry col-xs-12 col-sm-4", true, true);
			foreach($days_all as $day=>$entries):
			build_panel_header($year.$week.$day, $days[$day]);
			    foreach($entries as $b):
			    echo "<h3>$b->title <small>$b->week {$days[$day]} $b->year</small> <a href='/berichtsheft/edit/$b->id' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-pencil'></span> edit</a></h3>";
			    echo nl2br("<p>$b->content</p>");
			    echo "<br>";
			    endforeach;
			build_panel_footer();
			endforeach;
		    build_panel_footer();
		    endforeach;
		build_panel_footer();
		endforeach;
		echo "</div>";
	    ?>
	
	<script src="<?php get_base_url(); ?>/assets/js/gkiokan_berichtsheft.js"></script>
	<script>
	    $(function(){
		bhs.options_button(".options .btn");
	    });
	</script>


<?php template::footer(); ?>
