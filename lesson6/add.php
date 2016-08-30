<?php
require __DIR__ . '/functions/file.php';
require __DIR__ . '/models/model.php';
if (!empty($_POST)) {
    $data = [];
    if (!empty($_POST['filename'])) {
        $data['filename'] = $_POST['filename'];
    }
    if (!empty($_FILES)) {
        $res = file_upload('pic');
        if(false !== $res) {
            $data['picture'] = $res;
        }
    }
    if (isset($data['filename']) && isset($data['picture'])) {
        images_insert($data);
        header('Location: /lesson6/index.php');
        die;
    }
}
include __DIR__ . '/views/add.php';
?>