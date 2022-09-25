<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Категория новостей</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php include_once('menu.php') ?>
    <h1>Новости категории</h1>
    <?php foreach ($news as $item) : ?>
        <a href="/news/category/message/<?= $item['id'] ?>"><?= $item['title'] ?></a><br>
    <?php endforeach; ?>
</body>

</html>