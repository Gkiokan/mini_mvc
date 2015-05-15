<?php
/*
    Project: Gkiokan - mini MVC
    Date: 15.05.2015
    Comments: - Just a basic MVC Strukture without any OOP.
    How to Use:
      Generate your desired Page Name as a file in the template folder
      and use the standart Methods to get the header and footer.


*/
    include('core/init.php');

    $seite = isset($_GET['uri']) ? filter_var($_GET['uri']) : 'home';

    // Seite wurde eingegeben
    if(check_file($seite)):
        include('view/'.$seite.'.php');
    else:
        include('view/errors/404.php');
    endif;



?>
