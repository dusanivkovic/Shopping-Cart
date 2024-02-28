<?php
namespace app\models;
require_once './vendor/autoload.php';
use app\lib\{Session, Db};
class User
{
    public string $firstName;
    public string $lastName;
    public string $mail;
    public string $password;

    public function __construct($firstName, $lastName, $mail, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->mail = $mail;
        $this->password = $password;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    public function setFirstName($userName): void
    {
        $this->firstName = $userName;
    }
}
