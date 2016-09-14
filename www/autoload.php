<?php
function my_autoload($class) {
    $class_parts = explode('\\', $class);
    $class_parts[0] = __DIR__;
    $class_path = implode(DIRECTORY_SEPARATOR, $class_parts) . '.php';
    if (file_exists($class_path)) {
        require_once($class_path);
    }
}
spl_autoload_register('my_autoload');
require __DIR__ . '/vendor/autoload.php';
?>