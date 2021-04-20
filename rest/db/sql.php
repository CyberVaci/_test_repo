<?php

class Query
{
  protected $_dbHandle;
  protected $_result;
  protected $_table;

  function connect($address, $account, $pwd, $database)
  {
    $this->_dbHandle = @mysqli_connect($address, $account, $pwd, $database);
    if ($this->_dbHandle != 0) {
      return 1;
    } else {
      return 0;
    }
  }

  function disconnect()
  {
    if (@mysqli_close($this->_dbHandle) != 0) {
      return 1;
    } else {
      return 0;
    }
  }

  function selectAll()
  {
    $query = 'select * from `' . $this->_table . '`';
    return  $this->query($query);
  }

  function select($id)
  {
    $query = 'select * from `' . $this->_table . '` where `id` = \'' . $id . '\'';
    return $this->query($query);
  }

  function query($query)
  {
    $this->_result = mysqli_query($this->_dbHandle, $query);
    $result = $this->_result;
    return ($result);
  }

  function getRows()
  {
    return mysqli_fetch_assoc($this->_result);
  }

  function getRow()
  {
    return mysqli_fetch_assoc($this->_result);
  }

  function getNumRows()
  {
    return mysqli_num_rows($this->_result);
  }

  function getError()
  {
    return mysqli_error($this->_dbHandle);
  }
}
