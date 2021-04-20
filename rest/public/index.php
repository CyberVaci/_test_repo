<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

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

include ROOT . DS . "config" . DS . "config.php";
include ROOT . DS . "db" . DS . "sql.php";
include ROOT . DS . "libraries" . DS . "token.php";
include ROOT . DS . "libraries" . DS . "shipping.php";

$url = $_GET["url"];
$urlArray = array();
$urlArray = explode("/", $url);
$controller = $urlArray[0];
array_shift($urlArray);
$action = $urlArray[0];
array_shift($urlArray);
$queryString = $urlArray;

if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($controller) . 'Controller.php')) {
  require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($controller) . 'Controller.php');
} else {
  $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
  $response['body'] = json_encode("Resource not found", JSON_PRETTY_PRINT);
  echo $response['body'];
}
