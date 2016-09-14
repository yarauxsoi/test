<?php
namespace App\controllers;
use App\models\News;
use App\classes\View;
use App\classes\Logs;
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
                $article = new News;
                $article->title = $news['header'];
                $article->content = $news['content'];
                $article->date = $news['date'];
                $article->save();
                header('Location: /index.php');
            }
        }
    }
    public function actionAddForm() {
        $view = new View;
        $view->display('add');
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
                $article = new News;
                $article->id = $news['id'];
                $article->title = $news['header'];
                $article->content = $news['content'];
                $article->save();
                header('Location: /index.php');
            }
        }
    }
    public function actionUpdateForm() {
        $view = new View;
        $data = News::get_all_titles();
        $view->titles = $data;
        $view->display('update');
    }
    public function actionDelete() {
        if (!empty($_POST)) {
            $id = '';
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
            }
            if (isset($id)) {
                $article = new News;
                $article->id = $id;
                $article->delete();
                header('Location: /index.php');
            }
        }
    }
    public function actionDeleteForm() {
        $view = new View;
        $data = News::get_all_titles();
        $view->titles = $data;
        $view->display('delete');
    }
    public function actionViewLogs() {
        $view = new View;
        $view->logs = Logs::show();
        $view->display('logs');
    }
    public function actionSendLogs() {
        Logs::send();
    }
}
?>