<?php
require '/functions/sql.php';
function news_get_single($id) {
    $sql = "SELECT title, content, date FROM news WHERE id=" . $id;
    return sql_query($sql);
}
?>