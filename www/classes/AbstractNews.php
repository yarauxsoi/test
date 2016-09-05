<?php
abstract class AbstractNews {
    protected $id;
    protected $title;
    protected $text;
    protected $date;
    protected static $table;
    public static function get_all() {
        $sql = "SELECT * FROM " . static::$table;
        $database = new Database();
        if ($res = $database->sql_query($sql)) {
            usort($res, 'self::sort_date');
            return $res;
        }
        return false;
    }
    public static function sort_date($a, $b) {
        $t1 = strtotime($a['date']);
        $t2 = strtotime($b['date']);
        return $t2-$t1;
    }
    public static function get_all_single($id) {
        $sql = "SELECT * FROM " . static::$table . " WHERE id=" . $id;
        $database = new Database();
        $res = $database->sql_query($sql);
        return $res[0];
    }
}
?>