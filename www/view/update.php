<html>
<head>
    <title>Изменить новость</title>
    <meta charset="utf-8">
</head
<body>
    <h2>Редактировать новость:</h2>
    <form action="/index.php?ctrl=News&act=Update" method="post">
        <label for="list">Выберите новость для изменения: </label>
        <select id="list" name="id">
            <?php foreach ($titles as $t): ?>
            <option value="<?=$t['id']?>"><?=$t['title']?></option>
            <?php endforeach; ?>
        </select><br><br>
        <label for="header">Новый заголовок: </label>
        <input type="text" name="header" id="header"><br><br>
        <label for="content">Новое содержание: </label><br>
        <textarea name="content" id="content"></textarea><br>
        <input type="submit" value="Опубликовать">
    </form>
</body>
</html>