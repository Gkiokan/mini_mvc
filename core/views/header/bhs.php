<?php /* * * * * * * * * * * * *
       * Project: Gkiokan NET v5.1 - Simple Styling Promote
       * Author: Gkiokan Sali
       * URL: www.gkiokan.net
       * Date: 09.09.2014
       * * * * * * * * * * * * */
       $data = $obj;
       $loggedIn = method_exists($data->user, 'isLoggedIn') ? $data->user->isLoggedIn() : false;
       $obj = $obj->template;

       // Prepare Meta Tags
       $title = $obj->title;
       $title = $title ? $title : "Gkiokan.NET | Developing 2k14 by Gkiokan Sali";

       $description = $obj->description;
       $description = $description ? $description : "Developers Network and Multimedia Page for Downloads, Projects, MVC, Coding, Codes, Snippets, Tripps, Tricks, Tuning & Co.";

       $keywords = $obj->keywords;
       $keywords = (!empty($keywords)) ? $keywords : "Gkiokan, Gkiokan NET, Sali Gkiokan, Multimedia, Projects, München, Developer, Entwickler, Downloads, Software, Online Plugins, WebCMD";
?>
<!DOCTYPE HTML>
<!--
    Thanks for Analysing my code.
    www.gkiokan.net Copyright by Gkiokan 2014
    contact me gkiokan@hotmail.de

  ________ __   .__        __                          _______  ______________________
 /  _____/|  | _|__| ____ |  | _______    ____         \      \ \_   _____/\__    ___/
/   \  ___|  |/ /  |/  _ \|  |/ /\__  \  /    \        /   |   \ |    __)_   |    |
\    \_\  \    <|  (  <_> )    <  / __ \|   |  \      /    |    \|        \  |    |
 \______  /__|_ \__|\____/|__|_ \(____  /___|  /  /\  \____|__  /_______  /  |____|
        \/     \/              \/     \/     \/   \/          \/        \/  !-->
<html lang=de>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="msvalidate.01" content="E7B5356824C5E6CA89808BD6FFD74038" />

        <meta name='author' content='Gkiokan Sali'>
        <meta name='keywords' content='<?=$keywords?>'>
        <meta name='description' content='<?=$description?>'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>

        <meta name="DC.creator" content="Gkiokan Sali">
        <meta name="DC.description" content="<?=$description?>">
        <meta name="DC.publisher" content="Gkiokan Sali">
        <meta name="DC.rights" content="All rights reserved by Gkiokan Sali">

        <meta property='og:title' content='<?=$title?>'>
        <meta property='og:site_name' content='<?=$title?>'>
        <meta property='og:url' content='http://www.gkiokan.net'>
        <meta property='og:type' content='website'>
        <meta property='fb:app_id' content='783298098380448'>
        <meta property='og:description' content='<?=$description?>'>
        <meta property='og:image' content='http://www.gkiokan.net/assets/icon/icon_g_white.png'>
        <meta property='og:image:type' content='image/png'>

        <title><?=$title?></title>

        <link rel='icon' href='<? get_base_url(); ?>/assets/icon/icon_g_white.png' type='image/png'>
        <link rel="apple-touch-icon" href='<? get_base_url(); ?>/assets/icon/icon_g_white.png'>

        <link rel='author' href='https://plus.google.com/+GkiokanSali/'>
        <link rel='publisher' href='https://plus.google.com/+GkiokanSali/'>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono|Poiret+One|Mr+De+Haviland|Waiting+for+the+Sunrise|Exo|Black+Ops+One|Iceland|Expletus+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>

        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/bootstrap.min.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/font-awesome.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/animation.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/navigation.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/header.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/footer.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/style_layout.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/style_sheme.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/parallex.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/style.css'>

        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/gkiokan_projects.css'>
        <link rel='stylesheet' type='text/css' href='<? get_base_url(); ?>/assets/css/berichtsheft_css_entry.css'>

        <script src='<? get_base_url(); ?>/assets/js/jquery-1.11.1.min.js'></script>
        <script src='<? get_base_url(); ?>/assets/js/bootstrap.min.js'></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-54771740-1', 'auto');
          /* ga('require', 'linkid', 'linkid.js');*/
          ga('require', 'displayfeatures');
          ga('send', 'pageview');
        </script>
        <style>
            .header {
                background: url(https://www.muenchen.ihk.de/de/bildung/Bilder/berichtsheft-artikel.jpg) center center no-repeat; background-size:cover;
                font-size:50px;
            }
        </style>
    </head>
    <?php /*
           * Generate Sheme
           */
        $shemes = array('light_content', 'darkred_content');
        $random = rand(0, count($shemes)-1);
        $random = 1;
        //$final_sheme = $shemes[$random];
    ?>
    <body class=' <?=$final_sheme?>' data-sheme='<?=$random?>' lang='de'>
    <?php /*
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '783298098380448',
          xfbml      : true,
          version    : 'v2.1'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/de_DE/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script> */
    ?>
    <nav class='main_header animate'>
        <? // <h1 class='hide'>Gkiokan.NET Navigation</h1> ?>
        <div class='mobile_menu_btn'><span class='glyphicon glyphicon-align-justify'></span></div>

        <div class='container'>
        <ul class='main_navigation'>
            <li><a href='/'><span class='glyphicon glyphicon-home'></span> Home</a></li>
            <li><a href='/aboutme'><span class='glyphicon glyphicon-tasks'></span> About Me</a></li>
            <li><a href='/project'><span class='glyphicon glyphicon-th'></span> Projects</a></li>
            <li class='hide'><a href='/#updates'>Updates</a></li>
            <li class='hide'><a href='/dev/'>Developing Enviroment</a></li>
        </ul>
        <?php if($loggedIn): ?>
        <ul class='user_navigation'>
            <li><a href='/berichtsheft'><span class='glyphicon fa fa-book'></span> Berichtsheft</a></li>
            <li><a href='/profil/ProjectAccess'><span class='glyphicon glyphicon-cog'></span> Project Acess</a></li>
            <li><a href='/profil/edit'><span class='glyphicon glyphicon-user'></span> My Profile</a></li>
            <li><a href='/logout'><span class='glyphicon glyphicon-off'></span> LogOut</a></li>
        </ul>
        <?php endif; ?>
        </div>
    </nav>

    <header class='header header_bhs'>
        <div class='container'>
            BerichtsHeftSystem v0.3 Beta<br>
        </div>
    </header>

    <?php
    if($data->sub_menu):
        echo "<ul class='sub_navigation animate'>";
        foreach($data->menu() as $key=>$val){
            $url = $val['url'];
            $title = $val['title'];
            $title = $val['icon'] ? "<span class='".$val['icon']."'></span> ".$title : $title;
            echo "<li><a href='$url' class='animate'>$title</a></li>";
        }
        echo "</ul>";
    endif;
    ?>

    <div class='main'>
        <div class='container'>
