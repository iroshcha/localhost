<?php
namespace modules\user;


class User
{
    public function add($login, $pass, $email)
    {
        if (!empty($login) && !empty($pass) && !empty($email)) {
            $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/token_data.json');
            $arUsers = json_decode($json);
            foreach ($arUsers as $arUser) {
                if ($login == $arUser->{'login'} || $email == $arUser->{'email'}) {
                    return "Логин или E-mail уже существует!";
                }
            }
            $arUsers[] = [
                "login" => $login,
                "email" => $email,
                "pass" => md5($pass),
            ];
            $json = json_encode($arUser);
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/token_data.json','w+');
            fwrite($file, $json);
            fclose($file);
        }
    }

    public function getList($arFilter)
    {

    }
}