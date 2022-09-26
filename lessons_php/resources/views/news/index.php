<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Новости</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php include_once('menu.php') ?>
    <h1>Все новости</h1>
    <a href="/news/category/1">Культура</a>&nbsp
    <a href="/news/category/2">Спорт</a>&nbsp
    <a href="/news/category/3">Наука</a>&nbsp
    <a href="/news/category/4">Политика</a>&nbsp
    <a href="/news/category/5">Путешествия</a><br>
    <hr>
    <?php foreach ($news as $item) : ?>
        <a href="/news/category/message/<?= $item['id'] ?>"><?= $item['title'] ?></a><br>
    <?php endforeach; ?>
</body>

</html>