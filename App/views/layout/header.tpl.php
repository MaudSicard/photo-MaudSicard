<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;1,700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="<?=$viewVars['baseUri'];?>/css/reboot.css">
    <link rel="stylesheet" href="<?=$viewVars['baseUri'];?>/css/style.css">
    <title>Photographie</title>
</head>

<body class = "container">
    <header class = "container_header">
        <div>
        <h1>Photographie</h1>
        <p>Pour vous connecter : photo@mail.com / Photo</p>
        </div>
        <div class = "container_header_nav">
            <a class="container_header_a" href = "<?=$router->generate('main_home');?>">Accueil</a>
            <a class="container_header_a" href = "<?=$router->generate('user_login');?>">Se connecter</a>
        </div>
    </header>
    
  <main class="container_main">

<?php
require __DIR__ .'/../partials/nav.tpl.php';

?>
