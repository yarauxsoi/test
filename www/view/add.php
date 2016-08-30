<html>
<head>
    <title>Добавить новость</title>
    <meta charset="utf-8">
</head
<body>
    <h2>Добавить новость:</h2>
    <form action="/add.php" method="post">
        <label for="header">Заголовок: </label>
        <input type="text" name="header" id="header"><br><br>
        <label for="content">Содержание: </label><br>
        <textarea name="content" id="content"></textarea><br>
        <input type="submit" value="Опубликовать">
    </form>
</body>
</html>