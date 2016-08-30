<?php
function checkLoginPass($login, $password) {
    $users = ['vasya' => 'kobel', 'prana' => '3jhh', 'admin' => ''];
    return isset($users[$login]) && $users[$login] == $password;
}
function isUser() {
    return isset($_COOKIE['auth']);
}
function login($login) {
    setcookie('auth', $login, time()+100);
}
function logout() {
    setcookie('auth', '', time()-100);
}
/*
-------
*/
if (isUser()) {
    logout();
    exit;
}
if (empty($_POST['login']) || empty($_POST['password'])) {
    header('Location: /index.php');
    exit;
}
$login = $_POST['login'];
$password = $_POST['password'];
if (!checkLoginPass($login, $password)) {
    header('Location: /index.php');
    exit;
}
login($login);
header('Location: /profile.php');
/*
if ($_POST['exit'] == 'yes') {
    setcookie('auth', 'no', time()-100);
    echo 'You are logged out';
    exit;
}

if () {
    if ($_POST['remember'] == 'on') {
        setcookie('remember', 'yes', time()+100);
    }
    
    echo 'You are logged in';
}
*/
?>