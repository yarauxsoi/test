<?php
require __DIR__ . '/functions/sql.php';
require __DIR__ . '/classes/Database.php';
$get = new Database();
$news = $get->news_get();
include __DIR__ . '/view/index.php';
?>