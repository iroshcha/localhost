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
                    return false;
                }
            }
            $arUsers[] = [
                "login" => $login,
                "email" => $email,
                "pass" => md5($pass),
            ];
            $json = json_encode($arUsers);
            $file = fopen($_SERVER['DOCUMENT_ROOT'] . '/token_data.json','w+');
            fwrite($file, $json);
            fclose($file);
            return true;
        }
    }

    public function Auth($login, $pass)
    {
        if (!empty($login) && !empty($pass)) {
            $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/token_data.json');
            $arUsers = json_decode($json);
            foreach ($arUsers as $arUser) {
                if ($login == $arUser->{'login'} && md5($pass) == $arUser->{'pass'}) {
                    $_SESSION['login'] = $login;
                    return $login == $arUser->{'login'};
                }
            }
            return false;
        }
    }
    public function getList($arFilter)
    {

    }
}