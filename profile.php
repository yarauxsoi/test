<?php
function getUser() {
    return $_COOKIE['auth'];
}
function getStyle() {
    return $_COOKIE['style'];
}
function isUser() {
    return isset($_COOKIE['auth']);
}
if (!isUser()) {
    header('Location: /index.php');
    exit;
}
if (getStyle()){
    switch (getStyle()) {
        case '1':
            $style = 'style1.css';
            break;
        case '2':
            $style = 'style2.css';
            break;
        case '3':
            $style = 'style3.css';
            break;
        default:
            $style = '';
    }
}
$username = $_COOKIE['login'];
$rem = (isset($_COOKIE['remember'])) ? 'yes' : 'no';
?>
<html>
<head>
    <title>Welcome, <?=getUser();?></title>
    <link type="text/css" rel="stylesheet" href="<?=$style?>">
</head>
<body>
    <h4>Your profile:</h4>
    <ul>
        <li>Username: <?=getUser();?></li>
        <li>Remembered: <?=$rem;?></li>
    </ul>
    <a href="settings.php">Change style</a>
    <form method="post" action="auth.php">
        <button type="submit" name="exit" value="yes">Log out</button>
    </form>
</body>
</html>