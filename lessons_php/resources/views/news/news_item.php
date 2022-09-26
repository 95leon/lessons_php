<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Новость</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php include_once('menu.php') ?>
    <h1>Новость</h1>
    <h2><?= $news['title'] ?></h2>
    <h4><?= $news['text'] ?></h4>
</body>

</html>