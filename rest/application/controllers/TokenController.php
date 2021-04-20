<?php

use libraries\token as Token;

class TokenController extends Query
{
  private $db;
  private $requestMethod;
  private $token;
  private $jwtToken;
  private $_config;

  public function __construct($config, $requestMethod)
  {
    $this->db  = $this->connect($config["DatabaseHost"],$config["DatabaseUser"],$config["DatabasePassword"],$config["Database"]);
    $this->requestMethod = $requestMethod;
    $this->token = new Token\Token();
    $this->processRequest();
  }

  private function getToken()
  {
    $this->jwtToken = $this->token->generateToken('1', 'Levan Tvauri', $this->_config["JwtKey"]);
    $result = [
      'Token' => $this->jwtToken];
    $response['status_code_header'] = 'HTTP/1.1 200 OK';
    $response['body'] = json_encode($result);
    $this->saveToken();
    return $response;
  }

  private function saveToken()
  {
    $this->query("INSERT INTO `token` (`token`,`user_id`,`create_date`,`valid_to`) VALUES ('".$this->jwtToken."',1,NOW(),DATE_ADD(NOW(), INTERVAL 1 HOUR))");
  }

  private function notFoundResponse()
  {
    $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
    $response['body'] = json_encode("action not found");
    return $response;
  }

  public function processRequest()
  {
    switch ($this->requestMethod) {
      case 'getToken':
        $response = $this->getToken();
        break;
      default:
        $response = $this->notFoundResponse();
        break;
    }
    header($response['status_code_header']);
    if ($response['body']) {
      echo $response['body'];
    }
  }
}

$controller = new TokenController($config, $action);
