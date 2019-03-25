<?php /* * * * * * * * * * * * * 
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 10.11.2014
       * * * * * * * * * * * * */

		 
		 
    $post = $_GET;
    $post = json_encode($post);
    
    $var = $data;
    $var = json_encode($var);
    
    $t = $this;
    $t = json_encode($t);
	 
	 //$this->template->setTitle('Test for you');
	 //$this->template->set('description', "Hellow World!");	 
	 template::header($this);

	 echo $post, $var, $t;
?>
	 <?php
		  $test = false;
	 
		  if(input::exists()):
		  if(token::check(input::get('token'))):
				$test = true;
				
				debug(input::all());
				
		  endif; endif;
	 ?>
	 
	 <form method='post'>
		  
		  <div class='field'>
				<input class='form-control' name='name' placeholder='Name Input'>
		  </div>
		  <div class='field'>
				<input class='form-control' name='text' placeholder='Text feld for something'>
		  </div>
		  <br>
		  <?php
				if($post):
					 echo "Deine Eingabe für Name: ".input::get('name')."<br>";
					 echo "Dein Text: ".input::get('text')."<br>";
				endif;				
		  ?>
		  <br>
		  <div class='field'>
				<input type='submit' value='Go'>
		  </div>
		  <input type='hidden' name='token' value='<?php echo token::generate(); ?>'>
	 </form>
	 
	 




<?php template::footer(); ?>