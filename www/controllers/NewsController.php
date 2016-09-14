<?php
namespace App\controllers;
use App\models\News;
use App\classes\View;
use App\classes\E404Exception;
class NewsController {
    public function actionAll() {
        $view = new View;
        $news = News::get_all();
        $view->news = $news;
        $view->display('index');
    }
    public function actionOne() {
        $view = new View;
        $id = $_GET['id'];
        $new = News::get_all_single($id);
        if (empty($new)) {
            throw new E404Exception('Запрашиваемая вами новость не найдена', 404);
        }
        $view->items = $new;
        $view->display('news');
    }
}
?>