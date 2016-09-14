<html>
<head>
    <title>Удалить новость</title>
    <meta charset="utf-8">
</head
<body>
    <h2>Удалить новость:</h2>
    <form action="/Admin/Delete" method="post">
        <label for="list">Выберите новость: </label>
        <select id="list" name="id">
            <?php foreach ($titles as $t): ?>
            <option value="<?=$t['id']?>"><?=$t['title']?></option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Удалить">
    </form>
</body>
</html>