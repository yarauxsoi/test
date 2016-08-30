<?php
require '/functions/sql.php';
function news_add($news) {
    $sql = "INSERT INTO news (title, content, date) VALUES ('" . $news['header'] . "', '" . $news['content'] . "', '" . $news['date'] . "')";
    return sql_exec($sql);
}
?>