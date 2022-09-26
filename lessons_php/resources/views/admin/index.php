<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Авторизация</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php include_once('menu.php') ?>
    <h1>Страница авторизации</h1>
    <form>
        <h4>Авторизация</h4>
        <input style="margin-bottom: 3px;" type="text" name="login" placeholder="ваш логин"><br>
        <input style="margin-bottom: 3px;" type="password" name="password" placeholder="введите пароль"><br>
        <label><input style="margin-bottom: 3px;" type="checkbox" name="check">запомнить меня</label><br>
        <input type="submit" value="Войти">
    </form>
</body>

</html>