<?php
    $this->template->title("Alle meine Eintrag ansehen | Berichtsheft System | Gkiokan.NET");
    $this->template->set('description', 'Alle deine Einträge');
    $this->template->set('keywords', '');

	 template::header($this);

	 $days = $data->days;
	 $user = $data->user->data();
?>

	 <h1>Verfügbare Einträge</h1>
	 
	 <? /** Old Button Style /**	
	 <div class='btn-group btn-group-sm'>
	    <a href='/berichtsheft/neu' class='btn btn-primary'><span class='glyphicon glyphicon-plus'></span> Neuer Eintrag</a>
	    <a href='/berichtsheft/alle' class='btn btn-info'><span class='glyphicon glyphicon-tasks'></span> Alle Anzeigen</a>
	    <a href='/berichtsheft/index' class='btn btn-success'><span class='glyphicon glyphicon-cog'></span> Einstellungen</a>
	 </div> */ ?>
	 <br>
	 <br>
	 <?php template::showErrors($this->errors);?>
	 <?php
		  //show_all_errors();

		  $entries = $this->_db->query('SELECT * from berichtsheft_entrys order by id DESC')->results();;
	 ?>
	 <div class='row clearfix bhs_alle_eintrage'>

		  <?php
				$week_count = 0;
				foreach($entries as $entry):
					 if($week_count==0):
					 echo "<div class='col-xs-12'><br></div>";
					 echo "<div class='col-xs-12 col-sm-6 col-md-3'>";
					 echo "<div class='entry entry_first'>";
						  echo "<div class='title'><h4>$user->username</h4></div>";
						  echo "<div class=''><a href='/profil/user/$user->username' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-user'></span> User Profil</a></div>";
						  echo "<div class='options'>$user->name $user->vorname <br>$user->stadt</div>";
					 echo "</div>";
					 echo "</div>";
					 endif;

					 echo "<div class='col-xs-12 col-sm-6 col-md-3'>";
						  echo "<div class='entry'>";
						  echo "<div class='title'><h4>$entry->title</h4></div>";
						  echo "<div class='week'>Woche $entry->week</div>";
						  echo "<div class='day'>{$days[$entry->day]}</div>";
						  echo "<div class='year'>Jahr $entry->year</div>";
						  echo "<span class='linkTo'><a href='/berichtsheft/eintrag/$entry->id' class='btn btn-xs btn-info'><span class='glyphicon glyphicon-eye-open'></span> ansehen</a></span>";
						  echo "<span class='linkTo'><a href='/berichtsheft/edit/$entry->id' class='btn btn-xs btn-success'><span class='glyphicon glyphicon-pencil'></span> edit</a></span>";
						  echo "</div>";
					 echo "</div>";

					 $week_count++;
					 $week_count = ($week_count==7) ? 0 : $week_count;
				endforeach;
		  ?>

	 </div>


<?php template::footer(); ?>
