<?php
class Database {
    public function __construct() {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('test');
    }
    public static function sql_exec($sql) {
        mysql_query($sql);
        if(mysql_error()) {
            return false;
        }else{
            return true;
        }
    }
    public static function sql_query($sql) {
        $res = mysql_query($sql);
        if(false === $res) {
            return false;
        }
        $query_res = [];
        while (false !== $row = mysql_fetch_assoc($res)) {
            $query_res[] = $row;
        }
        return $query_res;
    }
}
?>