<?php
var_dump($_SERVER);
if ($_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/index.php') {
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_list = explode('/', trim($uri_path, '/'));
    if (count($uri_list) % 2 == 1) {
        die;
    }
    $_GET['ctrl'] = array_shift($uri_list);
    $_GET['act'] = array_shift($uri_list);
    for ($i = 0; count($uri_list) > $i; $i++) {
        $_GET[$uri_list[$i]] = $uri_list[++$i];
    }
}
var_dump($uri_list);
require __DIR__ . '/autoload.php';
$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';
$ctrlName = $ctrl . 'Controller';
$controller = new $ctrlName;
$actName = 'action' . $act;
$controller->$actName();
?>