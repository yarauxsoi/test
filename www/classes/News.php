<?php
require __DIR__ . '/Article.php';
class News extends Article{
    public function __construct($id) {
        $this->id = $id;
        $get = Database::news_get_single($id);
        $this->title = $get['title'];
        $this->text = $get['content'];
        $this->date = $get['date'];
    }
    public function get_date() {
        return $this->date;
    }
}
?>