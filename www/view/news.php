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
        <p id="date"><?=$new[0]['date']?></p>
        <h1><?=$new[0]['title']?></h1>
        <p><?=$new[0]['content']?></p>
        <a href="/index.php">На главную</a>
    </div>
</body>
</html>