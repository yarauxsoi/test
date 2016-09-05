<?php
class NewsController {
    public function actionAll() {
        $news = News::get_all();
        include __DIR__ . '/../view/index.php';
    }
    public function actionOne() {
        $id = $_GET['id'];
        $new = News::get_all_single($id);
        include __DIR__ . '/../view/news.php';
    }
}
?>