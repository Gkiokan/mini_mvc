<?php get_header(); ?>

<div class='container'>
    <h1>Welcome to the mini MVC System v.0.1</h1>
    <br>
    <br>
    This is a little PHP MVC System <b>without</b> Object Oriented Programming.<br>
    It will suite well for quick page Development with less funktionality.<br>
    <br>
    <br>
    You are able to build your Pages in a Template file, which will be included<br>
    by his name and you can also serve a functionality on the same page with an<br>
    logical (if(x==y)) Question if needen.<br>
    <br>
    <br>


    <h3>Structure</h3>
    You have an basic Structure of the Files which should be basically protected by an .htaccess.<br>
    <br>
    <div class='row'>
    <div class='col-xs-8'>
    <pre>
  - root
    |- assets/              // Here goes all your Assets like CSS, JS, SASS, images, icons, etc.
        |- css/             // Your basic CSS Folder
        |- js/              // Your basic JS  Folder
        |- images/          // Main Folder for basic Images and Icons.

    |
    |- class/               // This Classses will be autoloaded by their name
        |- cookie.php       // Cookie Class for handling cookies
        |- hash.php         // Hash Class for handling hashes
        |- session.php      // Session Class for handling Session Data
        |- token.php        // Token Class for basic hash generating

    |- core/                // Core include files
        |- config.php       // Some Main Configurations you may take
        |- init.php         // The Init File which will be included for the index.php
        |- function.php     // Basic functions in global scope

    |- template/            // Here goes your Page Content
        |- 404.php          // 404 Error Page
        |- home.php         // Home Page, Startpage and Fallback on first Page.

    |- view/                // Here you go for your basic Header, Footer and Navigation files.
        |- header.php       // Contents the Header Part
        |- footer.php       // Contents the Footer Part
        |- navigation.php   // Contents the Navigation Elements

  .htaccess                 // Provides nice URI links
  index.php                 // Initialises the App.
    </pre>
    </div></div>
    <br>
    <br>


    <h3>How to use it?</h3>
    This MVC is using the Model View Controller prinzip by a part of it.<br>
    The Controller is actually just an implement in the View<br>
    due the time saving in creating just a Controller for the View.<br>
    So you go in the template Folder and create your desired File.<br>
    <br>
    You create the file like the page link you wanna have. Example:<br>
    <pre>
  URI:   domain.com/help-tutorial
  FILE:  template/help-tutorial.php</pre>
    <br>
    <br>


    <h3>Basic Skeleton of your Template</h3>
    Well, as you have kinda always the same header, footer and also navigation,<br>
    it's very practicable to include them with an little function in your Template.<br>
    <br>
    In the View Folder you have tree basic files. <b>footer.php, header.php and navigation.php</b>.<br>
    Theese files will be includen on each you trigger the functions get_header and get_footer.<br>
    It's also Important that you can modify them with an Array of Data as shown <a href='custom-page-help'>here</a>.<br>
    <br>
    <pre>
  &lt;?php get_header(); ?&gt;
  ...
  ... Your Content goes here
  ...
  &lt;?php get_footer(); ?&gt;</pre>
    <br>
    <br>




</div>


<?php get_footer(); ?>
