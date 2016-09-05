<?php
class AdminController {
    public function actionAdd() {
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
                if (News::news_add($news)) {
                    header('Location: /index.php');
                }
            }
        }
        include __DIR__ . '/../view/add.php';
    }
    public function actionUpdate() {
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
                News::news_update($news);
                header('Location: /index.php');
            }
        }
        $titles = News::get_all_titles();
        include __DIR__ . '/../view/update.php';
    }
}
?>