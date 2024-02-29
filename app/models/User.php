<?php
namespace app\models;
// require_once __DIR__ . '/../../vendor/autoload.php';
use app\lib\{Session, Db};
class User
{
    public  Db $db;
    public string $firstName,  $lastName,  $mail,  $password;

    public function __construct($db, $firstName, $lastName, $mail, $password)
    {
        $this->db = $db;
        $this->firstName = $this->db->validation($firstName);
        $this->lastName = $this->db->validation($lastName);
        $this->mail = $this->db->validation($mail);
        $this->password = $this->db->validation($password);

    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    public function setFirstName($userName): void
    {
        $this->firstName = $userName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }
}
