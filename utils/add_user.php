<?php
function add_user ($username, $email, $firstname, $lastname, $passwd ) {
    $encodedPW = password_hash($passwd, PASSWORD_BCRYPT);
    $stmt = DB_Connect::dbConnect()->prepare("
        INSERT INTO user (username, email, firstname, lastname, password)
        VALUES (:username, :email, :firstname, :lastname, :password)
    ");

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':password', $encodedPW);
    $stmt->execute();
}

add_user('Noziho', 'yskaa59570@gmail.com', 'Noah', 'Decroix', 'Edcijn321');