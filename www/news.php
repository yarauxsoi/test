<?php
require __DIR__ . '/functions/sql.php';
require __DIR__ . '/classes/Database.php';
$get = new Database();
$new = $get->news_get_single($_GET['id']);
include __DIR__ . '/view/news.php';
?>