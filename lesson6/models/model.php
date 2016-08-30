<?php
require_once __DIR__ . '/../functions/sql.php';
function images_get_all() {
    $sql = 'SELECT * FROM pictures';
    return sql_query($sql);
}
function images_insert($data) {
    $query = "INSERT INTO pictures (name, path) VALUES ('" . $data['filename'] . "', '" . $data['picture'] . "')";
    sql_exec($query);
}
?>