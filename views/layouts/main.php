<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?if ($auth):?>
    Добро пожаловать <?=$username?> <a href="/user/logout/"> [Выход]</a>
<?else:?>
    <form action="/user/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        Save? <input type='checkbox' name='save'>
        <input type="submit" name="submit" value="Войти">
    </form>
    <a href="/user/reg/">Зарегистрироваться</a>
<?endif;?><br>

<?=$menu?><br>
<?=$content?>
</body>
</html>