<html>
<head>
    <title>/logs/logs.txt</title>
    <meta charset="utf-8">
</head
<body>
    <div>
        <form action="/Admin/SendLogs" method="post">
            <label>Отправить логи на E-Mail</label><br>
            <label for="mail">E-Mail адрес:</label>
            <input id="mail" name="mail" type="email"> 
            <input type="submit" value="Отправить">
        </form>
        <p>
            <?=$logs?>
        </p>
    </div>
</body>
</html>