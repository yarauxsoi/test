<?php
require __DIR__ . '/functions/sql.php';
require __DIR__ . '/classes/Database.php';
require __DIR__ . '/classes/News.php';
$article = new News($_GET['id']);
$new = $article->get_article();
include __DIR__ . '/view/news.php';
?>