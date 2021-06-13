<?php
session_start();
if (isset($_GET['out'])){
    header("Location:/");
    session_destroy();
}
?>
<html>
<head>
    <title>Главная</title>
</head>
<body>
<form method="get" action="/">
    <input type="submit" name="reg" value="Регистрация">
</form>
<?
if (!empty($_SESSION['login'])) {
    ?>
    <div>Привет, <?=$_SESSION['login']?></div>
    <form method="get" action="/">
        <input type="submit" name="out" value="Выход">
    </form>
    <?
} else {
    ?>
    <form method="get" action="/">
        <input type="submit" name="auth" value="Авторизация">
    </form>
    <?
}
if($_GET['reg']) {
?>
        <label for="login"> login <input type="text" name="login"></label>
        <br>
        <br>
        <label for="email"> email <input type="text" name="email"></label>
        <br>
        <br>
        <label for="password"> password <input type="password" name="password"></label>
        <br>
        <br>
        <input type="submit" name="reg" value="Зарегестрироваться">
    <?
}

if($_GET['auth'] && empty($_SESSION['login'])) {
    ?>
    <label for="Alogin"> login <input type="text" name="Alogin"></label>
    <br>
    <br>
    <label for="Apassword"> password <input type="password" name="Apassword"></label>
    <br>
    <br>
    <input type="submit" name="auth" value="Авторизоваться">
    <?
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var url = "/"
        $('input[name="reg"]').click(function () {
            var login = $('input[name="login"]').val();
            var email = $('input[name="email"]').val();
            var pass = $('input[name="password"]').val();
            $.ajax({
                type: "POST",
                url: "/modules/ajax.php?reg=Y",
                data: {
                    email: email,
                    password: pass,
                    login: login,
                },
                success: function(msg){
                    alert( msg );
                }
            });
        })
        $('input[name="auth"]').click(function () {
            var login = $('input[name="Alogin"]').val();
            var pass = $('input[name="Apassword"]').val();
            $.ajax({
                type: "POST",
                url: "/modules/ajax.php?auth=Y",
                data: {
                    password: pass,
                    login: login,
                },
                success: function(msg){
                    if (msg == "") {
                        location.href = url;
                    } else {
                        alert( msg );
                    }
                }
            });
        });
    })
</script>
</body>
</html>
