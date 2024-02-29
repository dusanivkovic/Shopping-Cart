<?php
namespace app\lib;
require_once __DIR__ . '/../../config/config.php';
class Db
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $password = DB_PASSWORD;
    public $dataBase = DB_NAME;

    

    public function validation($data)
    {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
} 