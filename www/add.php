<?php
require __DIR__ . '/functions/sql.php';
require __DIR__ . '/classes/Database.php';
if (!empty($_POST)) {
    $news = [];
    if (!empty($_POST['header'])) {
        $news['header'] = $_POST['header'];
    }
    if (!empty($_POST['content'])) {
        $news['content'] = $_POST['content'];
    }
    if (isset($news['header']) && isset($news['content'])) {
        $news['date'] = date('j.m.Y');
        Database::news_add($news);
        header('Location: /index.php');
    }
}
include __DIR__ . '/view/add.php';
?>