<html>
<head>
</head>
<body>
<p>Your files:</p>
<ul>
    <?php foreach ($imgs as $img): ?>
    <li>
        <img src="<?=$img['path']?>" width="200" height="200">
        <?=$img['name']?>
    </li>
    <?php endforeach; ?>
</ul>
<?php include __DIR__ . '/form.php'; ?>
</body>
</html>