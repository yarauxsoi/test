<?php
require __DIR__ . '/autoload.php';
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
$ctrlName = $ctrl . 'Controller';
$controller = new $ctrlName;
$actName = 'action' . $act;
$controller->$actName();
?>