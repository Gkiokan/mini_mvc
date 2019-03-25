<?php
/*
 * Berichtsheft System
 * Based on Gkiokan.NET
 * Author: Gkiokan Sali
 */

 class berichtsheft extends Controller {
	 public $user;
	 public $bhs;	 
	 public $days = array(0=>'Montag', 1=>'Dienstag', 2=>'Mittwoch', 3=>'Donnerstag', 4=>'Freitag', 5=>'Samstag', 6=>'Sonntag');	 
	 static $_days = array(0=>'Montag', 1=>'Dienstag', 2=>'Mittwoch', 3=>'Donnerstag', 4=>'Freitag', 5=>'Samstag', 6=>'Sonntag');	 
	 public $years = array(2014=>2014, 2015=>2015);	 
	 public $weeks;
	 public $sub_menu = false;
	 public $category = false;
	 public $category_status = array(0=>'Geschlossen', 1=>'Freigegeben');
	 public $view = 'bhs';
	 public $footer = 'footer';
	 public $_db;
	 
	 public function __construct(){
		//show_all_errors();
		$this->user = $this->model('User');
		$this->bhs = $this->model('BHS', $this->user->data()->id);
		$this->sub_menu = $this->menu();		  
		$this->_db = db::getInstance();
		
		if(!$this->user->isLoggedIn()) {
			  session::flash('access_error', 'Um das Berichtsheft Sytem zu nutzen, musst du eingeloggt sein.');
			  redirect::to("/login");
		}
		
		for($w=1; $w<54;$w++) $this->weeks[$w] = $w;
	 }
	 	 
	 public function menu(){
		return array(
			   array("title"=>"Neuer Eintrag", "url"=>"/berichtsheft/neu", "icon"=>"glyphicon glyphicon-plus"),
			   array("title"=>"Alle Einträge", "url"=>"/berichtsheft/alle", "icon"=>"glyphicon glyphicon-tasks"),
			   array("title"=>"Meine Einträge", "url"=>"/berichtsheft/mybook", "icon"=>"glyphicon glyphicon-sort-by-attributes"),
			   array("title"=>"Kategorien", "url"=>"/berichtsheft/cat", "icon"=>"glyphicon glyphicon-indent-left"),
			   array("title"=>"Einstellungen", "url"=>"/berichtsheft/settings", "icon"=>"glyphicon glyphicon-cog")   
			   );
	 }
	 
	 public function index(){
		  redirect::to('/berichtsheft/mybook');
	 }
	 
	 public function settings(){		  
		  $this->view('berichtsheft/settings', $this);
	 }
	 
	 public static function days(){ return self::$_days; }
	 
	 public function neu(){
		  $user = $this->user;
		  
			if(input::exists()):
				if(token::check(input::get('token'))):					 
					 $entry = new validate();
					 $eintrag = $entry->check($_POST, array(
														  'title' => array('required'=>true, 'min'=>10),
														  'content' => array('required'=>true, 'min'=>10)														  
													 ));					 
					 if($eintrag->passed()){
						
						$entry = $this->model('BHS');
						try{
							  $entry->create(array(
													'title'=> input::get('title'),
													'content' => input::get('content'),
													'week' => input::get('week'),
													'day' => input::get('day'),
													'year' => input::get('year'),
													'category' => input::get('category'),
													'user_id' => $this->user->data()->id,
													'time'=>time()
														  ));
							  
						} catch(Exception $e){ die($e->getMessage()); }
						
						 
						$lastId = $this->_db->lastInsertId();
						redirect::to("/berichtsheft/eintrag/$lastId");
						//redirect::to("/berichtsheft/alle");
						 
					 } else { $this->errors = $eintrag->errors(); }
					 
				else:
					 $this->errors[] = "Some error accoured [:TKMM], please try again.";
				endif;
			endif;
			
			$this->view('berichtsheft/new', $this);
	 }
	 
	 public function eintrag($id){
			// http://www.motionbackgroundsforfree.com/wp-content/uploads/2012/02/Screen-shot-2012-02-07-at-10.02.45-AM.png
			$user = $this->user;
			$entry = $this->bhs;
			if(!$entry->find($id)) redirect::to('/berichtsheft/alle');
			if($entry->data()->user_id!=$user->data()->id){
				$this->errors[] = "<p class='bg-danger text-danger'>Du hast einen ungültigen Eintrag - für dich - aufgerufen!</p>";
				//$this->bhs = null;
		  }
		  
		  $this->view('berichtsheft/show', $this);
	 }
	 
	 public function edit($id){
			$user = $this->user;
			$entry = $this->bhs;
			 
			if(!$entry->find($id)) redirect::to('/berichtsheft/alle');
			if($entry->data()->user_id!=$user->data()->id){
				$this->errors[] = "<p class='bg-warning text-warning'>Der Eintrag ist nicht zu deinem User zugeteilt. Wende dich an den User um es Freizugeben zu lassen!</p>";
				//$this->bhs = null;
			} else {
				if(input::exists()):
				if(token::check(input::get('token'))):
					 $entry = new validate();
					 $eintrag = $entry->check($_POST, array(
														  'title' => array('required'=>true, 'min'=>10),
														  'content' => array('required'=>true, 'min'=>10)														  
													 ));					 
					 if($eintrag->passed()){
						
						$entry = $this->model('BHS');
						try{
							  $entry->update(array(
													'title'=> input::get('title'),
													'content' => input::get('content'),
													'week' => input::get('week'),
													'day' => input::get('day'),
													'year' => input::get('year'),
													'category' => input::get('category'),
													'time'=>time()
														  ), $id);
							  
						} catch(Exception $e){ die($e->getMessage()); }

						session::flash('edit_entry', "<p class='bg-success text-success'>Dein Eintrag wurde erfolgreich geändert</p>");
						redirect::to("/berichtsheft/eintrag/$id");
						//redirect::to("/berichtsheft/alle");
						 
					 } else { $this->errors = $eintrag->errors(); }


					$this->errors[] = "We may now proceed with the update for ID $id";
				endif;endif;
			}
		  
			$this->view('berichtsheft/edit', $this);
	 }
	 
	 public function alle(){		  
		  $this->view('berichtsheft/all', $this);
	 }
	 
	 public function mybook(){
		  $this->view('berichtsheft/mybook', $this);
	 }
	 
	 public function cat($params=null){
		$user = $this->user;
		$this->params = $params;
		$this->view('berichtsheft/cat', $this);
	 }
	 
	 public function CategoryEdit($id){
		$user = $this->user;
		$this->category = $this->bhs->findCategory($id);
		
		if($this->category->user_id!=$user->data()->id or !$this->category) redirect::to('/berichtsheft/cat');
		$cat_id = $this->category->id;
		
		if(input::exists()):
		if(token::check(input::get('token'))):					 		
			$validate = new validate();
			$check = $validate->check($_POST, array(
												'title'=> array('required'=>true, 'min'=>2)												
													));
			
			if($check->passed()):
				try{
					$this->bhs->updateCategory(array(
												'title' => input::get('title'),
												'options' => input::get('options'),
												'status' => input::get('status'),												
													 ), $this->category->id);
					session::flash('category_update', "<p class='bg-success text-success'>Kategorie Einstellungen gespeichert.</p>");
					//redirect::to("/berichtsheft/CategoryEdit/$cat_id/changed");
					//$this->errors[] = "<p class='bg-success text-success'>Kategorie Einstellungen gespeichert.</p>";
					$this->category = $this->bhs->findCategory($id);
					
				} catch(Exception $e){ die($e->getMessage()); }			
			else:
				$this->errors = $check->errors();
			endif;
			//1398
			
			
		else:
			$this->errors[] = "Something went wrong [:TKMM], please try again.";
		endif;
		endif;
		
		
		$this->category = $this->bhs->findCategory($id);
		$this->view('berichtsheft/cat_edit', $this);
	 }
	 
	 
	 public function CategoryNew(){
		$user = $this->user;		
		if(input::exists()):		
		if(token::check(input::get('token'))):
			$validate = new validate();
			$check = $validate->check($_POST, array( 'title' => array('required'=>true, 'min'=>2)));
			if($check->passed()):
				try{
					$this->bhs->createCategory(array(
											 'title'=>input::get('title'),
											 'options'=>input::get('options'),
											 'status'=>input::get('status'),
											 'user_id'=>$user->data()->id
											 ));
				} catch(Exception $e){ die($e->getMessage()); }
				
				$lastId = $this->_db->lastInsertId();
				redirect::to("/berichtsheft/CategoryEdit/$lastId/newCreated");
			else:
				$this->errors[] = $check->errors();
			endif;
			
		else:
			$this->errors[] = "Something went wrong [:TKMM], please try again.";
		endif;
		
		endif;
		
		
		$this->view('berichtsheft/cat_new', $this);
	 }
	 
	 
	 
	 
 }
 
 
?>