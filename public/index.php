<?php
session_start();
$page = $_GET['p'] ?? 'home';
$page = strip_tags($page);
redirect(sprintf(__DIR__ . '/../%s.php', $page));

function redirect ($pageName) {
    require file_exists($pageName) ? $pageName : __DIR__ . '/../404.php';
}

