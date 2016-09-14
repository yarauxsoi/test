<html>
<head>
    <title><?=$items['title']?></title>
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
        <p id="date"><?=$items['date']?></p>
        <h1><?=$items['title']?></h1>
        <p><?=$items['content']?></p>
        <a href="/index.php">На главную</a>
    </div>
</body>
</html>