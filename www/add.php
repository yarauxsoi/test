<?php
require '/module/add.php';
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
        news_add($news);
        header('Location: /index.php');
    }
}
include '/view/add.php';
?>