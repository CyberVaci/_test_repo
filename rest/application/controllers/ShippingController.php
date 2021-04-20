<?php
use libraries\shipping as Shipping;

class ShippingController extends Query
{
  private $db;
  private $requestMethod;
  private $shipping;

  public function __construct($config, $requestMethod)
  {
    $this->db = $this->connect($config["DatabaseHost"], $config["DatabaseUser"], $config["DatabasePassword"], $config["Database"]);
    $this->requestMethod = $requestMethod;
    $this->shipping = new Shipping\Shipping();
    $this->processRequest();
  }

  private function getPrice()
  {
    $result = [
      'shipping price' => $this->shipping->getShippingPrice(),
      'Currency'=>'GEL'
    ];
    $response['status_code_header'] = 'HTTP/1.1 200 OK';
    $response['body'] = json_encode($result);
    return $response;
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
      case 'getPrice':
        $response = $this->getPrice();
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

$controller = new ShippingController($config, $action);
