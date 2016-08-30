<?php
require '/module/news.php';
$new = news_get_single($_GET['id']);
include '/view/news.php';
?>