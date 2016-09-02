<?php
class News extends Article{
    public static function news_get() {
        $sql = "SELECT * FROM news";
        $database = new Database();
        if ($res = $database->sql_query($sql)) {
            usort($res, 'self::news_sort');
            return $res;
        }
        return false;
    }
    public static function news_sort($a, $b) {
        $t1 = strtotime($a['date']);
        $t2 = strtotime($b['date']);
        return $t2-$t1;
    }
    public static function news_get_single($id) {
        $sql = "SELECT title, content, date FROM news WHERE id=" . $id;
        $database = new Database();
        $res = $database->sql_query($sql);
        return $res[0];
    }
    public static function news_add($news) {
        $sql = "INSERT INTO news (title, content, date) VALUES ('" . $news['header'] . "', '" . $news['content'] . "', '" . $news['date'] . "')";
        $database = new Database();
        return $database->sql_exec($sql);
    }
    public static function news_get_titles() {
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