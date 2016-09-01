<html>
<head>
    <title><?=$new[0]['title']?></title>
    <meta charset="utf-8">
    <style>
        p#date {
            color: cadetblue;
            font-style: italic;
        }
    </style>
</head
<body>
    <div>
        <p id="date"><?=$new['date']?></p>
        <h1><?=$new['title']?></h1>
        <p><?=$new['content']?></p>
        <a href="/index.php">На главную</a>
    </div>
</body>
</html>