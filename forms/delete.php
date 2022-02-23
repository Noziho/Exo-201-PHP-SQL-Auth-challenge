<?php

require __DIR__ . '/../classes/Config.php';
require __DIR__ . '/../classes/DB_Connect.php';

function delete_content() {
    $id = $_GET['id'];
    $stmt = DB_Connect::dbConnect()->prepare("
        DELETE FROM hiking WHERE id = $id
    ");


    $stmt->execute();

    header("Location: /?p=read");
}

delete_content();
