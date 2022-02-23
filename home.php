<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php
if (isset($_SESSION['login'], $_SESSION['passwd'])) {?>
<h1>Bienvenue</h1>
<form action="/?p=/forms/logout" method="post">
    <div>
        <button type="submit" name="button">Se déconnecter</button>
    </div>
    <a href="/?p=read">Liste des randonnées</a>
    <a href="/?p=create">Ajouter une randonnée</a><?php
    }

else { ?>
    <h1>Se connecter: </h1>
    <form action="/?p=login" method="post">
        <div>
            <button type="submit" name="button">Se connecter</button>
        </div><?php
      } ?>
    </form>
</body>
</html>

