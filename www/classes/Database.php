<?php
namespace App\classes;
use PDO;
class Database {
    private $dbh;
    private $className;
    public function __construct() {
        $ds = 'mysql:dbname=test;host=localhost';
        $this->dbh = new PDO($ds, 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    }
    public function setClassName($class) {
        $this->className = $class;
    }
    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }
    public function query($sql, $params = []) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll();
    }
    public function execute($sql) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        if('00000' !== $sth->errorCode()) {
            return false;
        }else{
            return true;
        }
    }
}
?>