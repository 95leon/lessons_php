<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Добавление новости</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php include_once('menu.php') ?>
    <form>
        <h4>Добавление статьи</h4>
        <input style="margin-bottom: 3px;" type="text" name="title" placeholder="заголовок статьи"><br>
        <input style="margin-bottom: 3px;" type="text" name="text" placeholder="тело статьи"><br>
        <input style="margin-bottom: 3px;" type="text" name="description" placeholder="краткое описание"><br>
        <input type="submit" value="Добавить">
    </form>
</body>

</html>