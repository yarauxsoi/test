<?php
/*--------------*/
if (!is_uploaded_file($_FILES['pic']['tmp_name'])) {
    header('Location: /lesson6/index.php');
    exit;
}
if (empty($_POST['filename'])) {
    header('Location: /lesson6/index.php');
    exit;
}
if (upload()) {
    addPictureToDb();
    header('Location: /lesson6/index.php');
}
?>