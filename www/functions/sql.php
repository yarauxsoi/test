<?php
function sql_connect() {
    mysql_connect('localhost', 'root', '');
    mysql_select_db('test');
}
function sql_exec($sql) {
    sql_connect();
    mysql_query($sql);
    if(mysql_error()) {
        return false;
    }else{
        return true;
    }
}
function sql_query($sql) {
    sql_connect();
    $res = mysql_query($sql);
    $query_res = [];
    while (false !== $row = mysql_fetch_assoc($res)) {
        $query_res[] = $row;
    }
    return $query_res;
}
?>