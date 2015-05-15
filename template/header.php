<?php
    // $data will hold an Array of Data
    $title = isset_and_get($data, 'title');
    $sub   = isset_and_get($data, 'sub');
    $bg    = isset_and_get($data, 'background');
    $st    = isset_and_get($data, 'style');
    $bg    = $bg ? "background: url($bg) center center no-repeat; background-size:cover; " : null;

    $style = "style='$bg $st'";
?>

<!doctype HTML>
<html>
<head>
    <meta charset='utf-8'>
    <title><?php echo $title; ?></title>


    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
    <link rel='stylesheet' href='assets/css/style.css'>

    <script src='assets/js/jquery-1.11.2.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
</head>
<body>


<nav class='nav'>
    <?php include('template/navigation.php'); ?>
</nav>

<header>
    <div class='header' <?php echo  $style?>>
        <div class='container'>
            <?php echo $title ? "<p class='h1'>$title</p>" : null; ?>
            <?php echo $sub   ? "<p class='sub'>$sub</p>" : null; ?>

        </div>
    </div>
</header>


<section class='main'>
