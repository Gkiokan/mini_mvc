<?php

  $this->template->title("Posts on Gkiokan.NET");
  $this->template->set('description', 'Read posts on Gkiokan.NET about How-To, DIY, Tutorials, News, Code Snippets, PHP, JS, HTML, CSS, Coding and stuff.');
  template::header($this);

  $category = $this->params['category'];
  $name = $this->params['name'];


  echo "<h2>Gkiokan.NET | Posts | Index</h2>";

  echo "<div class='alert alert-info'>Your Search in <b>$category</b> for <b>$name</b></div>";
  echo "<br><br>";

  echo "<a href='/posts/ManagePosts'>Manage Posts</a><br>";
  echo "<a href='/posts/newPost'>New Post</a><br>";

  echo "<a href='/posts/ManageCategories'>Manage Categories</a><br>";
  echo "<a href='/posts/newCategory'>New Category</a><br>";

  echo "<a href='/posts/options'>Options</a>";








  template::footer();

?>
