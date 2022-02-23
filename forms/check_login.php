<?php
require __DIR__ . '/../classes/Config.php';
require __DIR__ . '/../classes/DB_Connect.php';
require __DIR__ . '/checkForm.php';

if (!formIsset('username', 'password', 'button')) {
    header("Location: /?p=404");
}
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password_en_clair = $_POST['password'];

checkFilter($username);
checkRange($username, 5, 255, '/?p=home');

$stm = DB_Connect::dbConnect()->prepare("
    SELECT password FROM user WHERE username = :username
");

$stm->bindParam(':username', $username);

if ($stm->execute()) {
    $password = $stm->fetch();
    $passwordEncrypt = password_hash($password_en_clair, PASSWORD_BCRYPT);

    if(password_verify($password_en_clair, $passwordEncrypt)) {
        $_SESSION['login'] = $username;
        $_SESSION['passwd'] = $passwordEncrypt;
        header("Location: /?p=home");
    }
}

