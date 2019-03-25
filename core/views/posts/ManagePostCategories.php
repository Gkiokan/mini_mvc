<?php

  $this->template->title('Manage Post Categories | Gkiokan.NET');

  template::header($this);


  $categories = $this->post->getCategories();

  echo "<h2>Manage Post Categories</h2>";
  echo "<br><br>";



  echo "<table class='table table-bordered'>";
  echo "<thead>";
  echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>Catgory Name</td>";
    echo "<td>Options</td>";
    echo "<td>Status</td>";
    echo "<td>Edit</td>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

  foreach($categories as $category):
    echo "<tr>";
      echo "<td>$category->id</td>";
      echo "<td>$category->name</td>";
      echo "<td>$category->options</td>";
      echo "<td>$category->status</td>";
      echo "<td><a href='/posts/editCategory/$category->id' class='btn btn-info'>Edit Category</a></td>";
    echo "</tr>";
  endforeach;
  echo "</tbody>";
  echo "</table>";





  template::footer();
?>
