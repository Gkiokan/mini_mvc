<?php
    $this->template->title("Kategorien Verwalten | Berichtsheft System | Gkiokan.NET");
    $this->template->set('description', 'Verwalte deine Categorien nach belieben');
    $this->template->set('keywords', '');

	 template::header($this);

	 $days = $data->days;
	 $user = $data->user->data();
	 $categories = $data->bhs->getCategories();
?>

	<h1>Kategorien verwalten</h1>
	 
	 <? /** Old Button Style /**	
	 <div class='btn-group btn-group-sm'>
	    <a href='/berichtsheft/neu' class='btn btn-primary'><span class='glyphicon glyphicon-plus'></span> Neuer Eintrag</a>
	    <a href='/berichtsheft/alle' class='btn btn-info'><span class='glyphicon glyphicon-tasks'></span> Alle Anzeigen</a>
	    <a href='/berichtsheft/index' class='btn btn-success'><span class='glyphicon glyphicon-cog'></span> Einstellungen</a>
	 </div> */ ?>
	 <br>
	 <br>
	 <?php template::showErrors($this->errors);?>
		<div class='field form-group'>		
		<label class='control-label'>Alle Kategorien zur direktauswahl <a href='/berichtsheft/CategoryNew'><span class='glyphicon glyphicon-plus'></span></a></label>
		<select name='category' class='form-control' id='direct_select'><?php echo $this->bhs->parseOptionObject($categories, 3); ?></select>
		</div>
		<br>
		<br>
		<table class='table table-hover table-bordered'>
		  <thead>
				<tr>
					 <td style='width:30px;'>ID</td>
					 <td>Kategorie</td>
					 <td>Optionen</td>
					 <td>Status</td>
					 <td class='text-right' style='width:120px'>Editieren</td>
				</tr>
		  </thead>
		  <tbody>
				<?php
					 foreach($categories as $key=>$val){
						  $id = $val->id;
						  $title = $val->title;
						  $status = $val->status==1 ? "<span class='label label-success'>{$this->category_status[1]}</span>" : "<span class='label label-danger'>{$this->category_status[0]}</span>";
						  $options = $val->options;
						  
						  echo "<tr>";
								echo "<td>$id</td>";
								echo "<td>$title</td>";
								echo "<td>$options</td>";
								echo "<td>$status</td>";
								echo "<td><a href='/berichtsheft/CategoryEdit/$id' class='btn-sm btn-info'><span class='glyphicon glyphicon-cog'></span> Editieren</a>";
						  echo "</tr>";
					 }
				?>
		  </tbody>
		  
		</table>
		<script>
			$(function(){
				$('#direct_select').on('change', function(){ window.location.href = "/berichtsheft/CategoryEdit/"+$(this).val(); });
			})
		</script>


<?php template::footer(); ?>
