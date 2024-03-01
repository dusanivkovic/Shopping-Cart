<?php
namespace app\lib;

use mysqli;

require_once __DIR__ . '/../../config/config.php';
class Db
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $password = DB_PASSWORD;
    public $dataBase = DB_NAME;
    public $query;
  
    public function __construct()
    {
      $this->conect();
    }

    public function conect()
    {
      $this->query = new mysqli($this->host, $this->user, $this->password, $this->dataBase) or die ('connection filed: ' .$this->query->connect_error);
      if ($this->query->connect_error)
      {
        
        die ('Connection fail: '.$this->query->connect_errno) ;

      }
      echo 'Successfully!';
      return true;
    }

    

    public function validation($data)
    {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
} 