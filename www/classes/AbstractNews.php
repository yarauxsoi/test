<?php
namespace App\classes;
use App\classes\Database;
abstract class AbstractNews {
    protected static $table;
    protected $data = [];
    public function __set($k, $v) {
        $this->data[$k] = $v;
    }
    public function __get($k) {
        return $this->data[$k];
    }
    public function __isset($k) {
        return isset($this->data[$k]);
    }
    private function insert() {
        $cols = array_keys($this->data);
        $dataEdited = [];
        foreach ($this->data as $d) {
            $dataEdited[] = "'" . $d . "'";
        }
        $sql = "INSERT INTO " . static::$table . " (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $dataEdited) . ")";
        $database = new Database();
        if ($database->execute($sql)) {
            $this->id = $database->lastInsertId();
        }
    }
    public function findByColumn($column, $value) {
        if (!isset($database)) {
            $database = new Database();
        }
        $sql = "SELECT * FROM " . static::$table . " WHERE " . $column . "='" . $value . "'";
        $res = $database->query($sql)[0];
        return $res;
    }
    private function update() {
        $data = [];
        foreach ($this->data as $k=>$v) {
            if ('id' == $k) {
                continue;
            }
            $data[] = $k . "='" . $v . "'";
        }
        $sql = "UPDATE " . static::$table . " SET " . implode(' ,', $data) . " WHERE id=" . $this->id;
        $database = new Database();
        return $database->execute($sql);
    }
    public function delete() {
        $sql = "DELETE FROM " . static::$table . " WHERE id=" . $this->id;
        $database = new Database();
        return $database->execute($sql);
    }
    public function save() {
        if (!isset($this->id)) {
            $this->insert();
        }else{
            $this->update();
        }
    }
    public static function get_all() {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$table;
        $database = new Database();
        $database->setClassName($class);
        if ($res = $database->query($sql)) {
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
        if ($res = $database->query($sql)) {
            return $res[0];
        }
        return false;
    }
    public static function get_all_titles() {
        $sql = "SELECT id, title FROM " . static::$table;
        $database = new Database();
        return $database->query($sql);
    }
}
?>