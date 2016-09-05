<?php
class News extends AbstractNews{
    protected static $table = 'news';
    public static function news_add($news) {
        $sql = "INSERT INTO news (title, content, date) VALUES ('" . $news['header'] . "', '" . $news['content'] . "', '" . $news['date'] . "')";
        $database = new Database();
        return $database->sql_exec($sql);
    }
    public static function get_all_titles() {
        $sql = "SELECT id, title FROM news";
        $database = new Database();
        return $database->sql_query($sql);
    }
    public static function news_update($news) {
        $sql = "UPDATE news SET title='" . $news['header'] . "', content='" . $news['content'] . "' WHERE id=" . $news['id'];
        $database = new Database();
        return $database->sql_exec($sql);
    }
}
?>