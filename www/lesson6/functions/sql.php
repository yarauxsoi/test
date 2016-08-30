<?php
function sql_connect() {    
    mysql_connect('localhost', 'root', '');
    mysql_select_db('test');
}
function sql_exec($query) {
    sql_connect();
    mysql_query($query);
}
function sql_query($query) {
    sql_connect();
    $res = mysql_query($query);
    $ret = [];
    while (false !== $row = mysql_fetch_array($res)) {
        $ret[] = $row;
    }
    return $ret;
}
?>