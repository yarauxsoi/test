<?php
require '/functions/sql.php';
function news_get() {
    $sql = "SELECT * FROM news";
    return sql_query($sql);
}
?>