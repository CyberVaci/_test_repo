<?php

class OrderController Extends Query
{
  private $db;
  private $requestMethod;

  public function __construct($config, $requestMethod)
  {
      $this->db  = $this->connect($config["DatabaseHost"],$config["DatabaseUser"],$config["DatabasePassword"],$config["Database"]);
      $this->requestMethod = $requestMethod;
      $this->processRequest();
  }

  private function putOrder()
  {
    $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    $this->query("INSERT INTO `order` (`user_id`, `amount`, `create_date`, `status`, `address`, `mobile`) VALUES (".$user_id.",".$amount.",NOW(),1,'".$address."','".$mobile."')");
    $result = ["added" => date("y-m-d H:i:s")];
    $response['status_code_header'] = 'HTTP/1.1 200 OK';
    $response['body'] = json_encode($result);
    return $response;
  }

  private function getOrder()
  {
      $order_id = explode('/',$_GET['url'])[2];
      $this->_table = "order";
      $this->select($order_id);

      $row = $this->getRow();
      $result = [
        'id' => $row['id'],
        'user_id' => $row['user_id'],
        'amount' => $row['amount'],
        'create_date' => $row['create_date'],
        'status' => $row['status'],
        'address' => $row['address']
      ];

      $response['status_code_header'] = 'HTTP/1.1 200 OK';
      $response['body'] = json_encode($result);
      return $response;
  }

  private function getOrders()
  {
    $this->_table = "order";
    $this->selectAll();

    while($row = $this->getRows())
    {
      $result[$row['id']] = [
          'id' => $row['id'],
          'user_id' => $row['user_id'],
          'amount' => $row['amount'],
          'create_date' => $row['create_date'],
          'status' => $row['status'],
          'address' => $row['address']
      ];
    }
    $response['status_code_header'] = 'HTTP/1.1 200 OK';
    $response['body'] = json_encode($result);
    return $response;
  }

  private function changeStatus()
  {
    $params = explode(  '/',$_GET['url']);
    $status = $params[3];
    $order_id = $params[2];
    $result = [
      'order' => $order_id,
      'status' => $status
    ];

    try {
      if ($status && $order_id)
      {
        $this->query("UPDATE `order` SET `status`=".$status." WHERE `id`=".$order_id." LIMIT 1");
      }
    } catch (Exception $e) {
      $result = ["error" => $e->getMessage()];
    }
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
      case 'getOrders':
        $response = $this->getOrders();
        break;
      case 'getOrder':
        $response = $this->getOrder();
        break;
      case 'changeStatus':
        $response = $this->changeStatus();
        break;
      case 'putOrder':
        $response = $this->putOrder();
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

$controller = new OrderController($config,$action);
