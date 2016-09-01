<?php
abstract class Article {
    protected $id;
    protected $title;
    protected $text;
    protected $date;
    public function get_title() {
        $result = ['id'=>$this->id,
                   'title'=>$this->title];
        return $result;    
    }
    public function get_article() {
        $article = ['id'=>$this->id,
                    'title'=>$this->title,
                    'content'=>$this->text,
                   'date'=>$this->date];
        return $article;
    }
}
?>