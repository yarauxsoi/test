<?php
function isUser() {
    return isset($_COOKIE['auth']);
}
function getUser() {
    return $_COOKIE['auth'];
}
function setStyle($n) {
    setcookie('style', $n, time()+100);
}
if (!isUser()) {
    header('Location: /index.php');
    exit;
}
if (isset($_POST['style'])) {
    setStyle($_POST['style']);
    echo "Style has been changed<br>";
}
?>
<html>
<head>
    <title>Welcome, <?=getUser()?></title>
</head>
<body>
    <form action="settings.php" method="post">
        <label>Style 1<input type="radio" name="style" value="1"></label>
        <label>Style 2<input type="radio" name="style" value="2"></label>
        <label>Style 3<input type="radio" name="style" value="3"></label><br>
        <input type="submit">
        <p><a href="profile.php">Back to profile</a></p>
    </form>
</body>
</html>