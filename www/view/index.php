<html>
<head>
    <title>Новости рунета</title>
    <meta charset="utf-8">
    <style>
        p#date {
            color: cadetblue;
            font-style: italic;
        }
    </style>
</head
<body>
    <?php foreach ($news as $n): ?>
    <div>
        <p id="date"><?=$n['date']?></p>
        <h1><?=$n['title']?></h1>
        <p><?=substr($n['content'], 0, 50)?></p>
        <a href="/index.php?ctrl=News&act=One&id=<?=$n['id']?>">Читать далее</a>
    </div>
    <?php endforeach; ?>
</body>
</html>