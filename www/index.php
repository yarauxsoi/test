<?php
require __DIR__ . '/functions/sql.php';
require __DIR__ . '/classes/Database.php';
$news = Database::news_get();
include __DIR__ . '/view/index.php';
?>