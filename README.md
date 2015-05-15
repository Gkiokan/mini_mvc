#Welcome to the mini MVC System v.0.1

This is a little PHP MVC System without Object Oriented Programming.
It will suite well for quick page Development with less funktionality.

You are able to build your Pages in a Template file, which will be included
by his name and you can also serve a functionality on the same page with an
logical (if(x==y)) Question if needen.


## Structure
You have an basic Structure of the Files which should be basically protected by an .htaccess.
<code>
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
</code>

## How to use it?
This MVC is using the Model View Controller prinzip by a part of it.
The Controller is actually just an implement in the View
due the time saving in creating just a Controller for the View.
So you go in the template Folder and create your desired File.

You create the file like the page link you wanna have. Example:
  URI:   domain.com/help-tutorial
  FILE:  template/help-tutorial.php


## Basic Skeleton of your Template
Well, as you have kinda always the same header, footer and also navigation,
it's very practicable to include them with an little function in your Template.

In the View Folder you have tree basic files. footer.php, header.php and navigation.php.
Theese files will be includen on each you trigger the functions get_header and get_footer.
It's also Important that you can modify them with an Array of Data as shown here.
<code>
  <?php get_header(); ?>
  ...
  ... Your Content goes here
  ...
  <?php get_footer(); ?>
</code>
