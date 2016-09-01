<?php
class Database {
    public function __construct() {
        sql_connect();
    }
    public function news_add($news) {
        $sql = "INSERT INTO news (title, content, date) VALUES ('" . $news['header'] . "', '" . $news['content'] . "', '" . $news['date'] . "')";
        return sql_exec($sql);
    }
    public function news_get() {
        $sql = "SELECT * FROM news";
        if ($res = sql_query($sql)) {
            usort($res, 'news_sort');
            return $res;
        }
        return false;
    }
    public function news_get_single($id) {
        $sql = "SELECT title, content, date FROM news WHERE id=" . $id;
        return sql_query($sql);
    }
    public function news_get_titles() {
        $sql = "SELECT id, title FROM news";
        return sql_query($sql);
    }
    public function news_update($news) {
        $sql = "UPDATE news SET title='" . $news['header'] . "', content='" . $news['content'] . "' WHERE id=" . $news['id'];
        return sql_exec($sql);
    }
    public function news_sort($a, $b) {
        $t1 = strtotime($a['date']);
        $t2 = strtotime($b['date']);
        return $t2-$t1;
    }
}
?>