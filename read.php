<?php
require __DIR__ . '/classes/Config.php';
require __DIR__ . '/classes/DB_Connect.php';

if (!isset($_SESSION['login'], $_SESSION['passwd'])) {
    header("Location: /?p=login");
}


?>
<!doctype html>
<html lang="fr">
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
    $stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM hiking
");

    if ($stmt->execute()) {?>
    <table><?php
        foreach ($stmt->fetchAll() as $value) {?>
        <tr>
            <td><a href="/?p=update&id=<?= $value['id'] ?>" title="Cliquez pour modifier la randonnée" ><?=$value['name'];?></a></td>
        </tr>

        <td>Difficulté: <?=$value['difficulty'];?></td>
        <td>Distance: <?=$value['distance'];?> km</td>
        <td>Durée: <?=$value['duration'];?></td>
        <td>Dénivelée: <?=$value['height_difference'];?> m</td>
        <td>Validité: <?= $value['available'] ?></td>
        <td><a href="/?p=/forms/delete&id=<?= $value['id'] ?>">Supprimez la randonnée</a></td>
                <?php
        }?>
    </table><?php
    }?>
    <a href="/?p=home">Home</a>
</body>
</html>

