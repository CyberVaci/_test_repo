<?php

include "config/config.php";
include "functions/mysql.php";
include "functions/user.php";

define('DEVELOPMENT_ENVIRONMENT', false);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

if (DEVELOPMENT_ENVIRONMENT == true) {
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
} else {
  error_reporting(E_ALL);
  ini_set('display_errors', 'Off');
  ini_set('log_errors', 'On');
  ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
}

if ($_GET["logout"])
{
    user_logout();
}

if ($_POST["Username"] && $_POST["Password"])
{
    $login_result = user_login($_POST["Username"],$_POST["Password"]);
    if (!$login_result) $login_error = 1;
}

if (!user_logged())
{
    include "core/shared/login.php";
}else include "core/shared/main.php";
