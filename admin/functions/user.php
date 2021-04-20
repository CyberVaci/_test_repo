<?php

function user_logged()
{
    if ($_SESSION['login'] && $_SESSION['id']) return true;
    return false;
}

function user_login($user_login, $user_password)
{
    global $db;
    $user_query = $db -> query("SELECT id,firstname,lastname,username FROM users WHERE username='" . $user_login . "' AND `password`='" . md5($user_password) . "' LIMIT 1");
    if ($user_query->num_rows) {
        $result = $user_query->fetch_assoc();
        $_SESSION['login'] = $result["username"];
        $_SESSION['id'] = $result["id"];
        return true;
    } else return false;
}

function user_logout()
{
    unset ($_SESSION['login'], $_SESSION['id'], $_SESSION['gid2556']);
}

session_name('test');
session_start();
