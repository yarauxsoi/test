<?php
class NewsController {
    public function actionAll() {
        $news = News::news_get();
        include __DIR__ . '/../view/index.php';
    }
    public function actionOne() {
        $id = $_GET['id'];
        $new = News::news_get_single($id);
        include __DIR__ . '/../view/news.php';
    }
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
        $titles = News::news_get_titles();
        include __DIR__ . '/../view/update.php';
    }
}
?>