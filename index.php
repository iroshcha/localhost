<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
session_start();
$_SESSION['LOGIN'];
$a = new modules\user\User();
$a->add('Li', 'fd', '3');
?>
<html>
<head>
    <title>Главная</title>
</head>
<body>
<form method="get" action="/">
    <input type="submit" name="reg" value="Регистрация">
</form>
<form method="get" action="/">
    <input type="submit" name="auth" value="Авторизация">
</form>
<?
if($_GET['reg']) {
?>
    <form method="post" action="/?reg=Регистрация">
        <label for="login"> login <input type="text" name="login"></label>
        <br>
        <br>
        <label for="login"> email <input type="text" name="email"></label>
        <br>
        <br>
        <label for="login"> password <input type="text" name="password"></label>
        <br>
        <br>
        <input type="submit" value="Зарегестрироваться">
    </form>
    <?
}
    ?>
</body>
</html>
