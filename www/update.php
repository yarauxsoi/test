<?php
require __DIR__ . '/functions/sql.php';
require __DIR__ . '/classes/Database.php';
if (!empty($_POST)) {
    $news = [];
    if (!empty($_POST['id'])) {
        $news['id'] = $_POST['id'];
    }
    if (!empty($_POST['header'])) {
        $news['header'] = $_POST['header'];
    }
    if (!empty($_POST['content'])) {
        $news['content'] = $_POST['content'];
    }
    if (isset($news['id']) && isset($news['header']) && isset($news['content'])) {
        $update = new Database();
        $update->news_update($news);
        header('Location: /index.php');
    }
}
$titles = Database::news_get_titles();
include __DIR__ . '/view/update.php';
?>