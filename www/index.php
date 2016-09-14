<?php
require __DIR__ . '/autoload.php';
use App\controllers\NewsController;
use App\controllers\AdminController;
use App\classes\Logs;
use App\classes\View;
use App\classes\E404Exception;
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
$ctrl = 'App\\controllers\\' . (isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News') . 'Controller';
$act = 'action' . (isset($_GET['act']) ? $_GET['act'] : 'All');
try {
    $controller = new $ctrl;
    $controller->$act();
}
catch (Exception $x) {
    switch ($x->getCode()) {
        case 404:
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            break;
        default:
            header($_SERVER['SERVER_PROTOCOL'] . ' 403');
    }
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/view');
    $twig = new Twig_Environment($loader, []);
    $twig->display('error.php', ['code' => $x->getCode(),                                                   'error' => $x->getMessage()]);
    $log = new Logs($x);
    $log->insert();
}
?>