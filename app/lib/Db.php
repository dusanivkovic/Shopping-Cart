<?php
namespace app\lib;
require_once __DIR__ . '/../../config/config.php';

use app\models\Model;
use mysqli;


class Db extends Model
{
  public $host = DB_HOST;
  public $user = DB_USER;
  public $password = DB_PASSWORD;
  public $dataBase = DB_NAME;
  public $conn;
  // public Model $model;

  public function __construct()
  {
    $this->conect();
  }

  public function conect()
  {
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dataBase);
    // $this->errors = $this->conn->connect_error ?('Connection fail: '.$this->conn->connect_errno) : '';
  }

  public function selectRecords ($query)
  {
    $result = $this->conn->query($query) or die ('connection filed: ' .$this->conn->error . __LINE__);
    return $result->num_rows > 0 ? $result : false;
  }

  public function insertRecord ($query)
  {
    $result = $this->conn->query($query) or die ('connection filed: ' .$this->conn->error . __LINE__);
    return $result ?? false;    
  }

  public function updateRecord ($query)
  {
    $result = $this->conn->query($query) or die ('connection filed: ' .$this->conn->error . __LINE__);
    return $result ?? false;    
  }

} 