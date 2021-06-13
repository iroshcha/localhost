<?php
spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . "\\" . $class_name . '.php';
});
session_start();
if ($_GET['reg'] == 'Y') {
    if (isset($_POST['login']) ||  isset($_POST['email']) || isset($_POST['password'])){
        if (!empty($_POST['login']) ||  !empty($_POST['email']) || !empty($_POST['password'])) {
            $objUser = new modules\user\User();
            if ($objUser->add($_POST['login'], $_POST['password'], $_POST['email'])) {
                echo "Вы зарегестрированы!";
            } else {
                echo "Пользователь с таким Логином или E-mail уже существует...";
            }
        } else {
            echo "Заполнете ВСЕ поля!";
        }
    }
} elseif ($_GET['auth'] == 'Y') {
    if (isset($_POST['login']) ||  isset($_POST['password'])){
        if (!empty($_POST['login']) ||  !empty($_POST['password'])){
            $objUser = new \modules\user\User();
            if (!$objUser->Auth($_POST['login'], $_POST['password'])) {
                echo "Неверный логин или пароль!";
            }
        } else {
            echo "Заполнете ВСЕ поля!";
        }
    }
}