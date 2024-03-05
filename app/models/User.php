<?php
namespace app\models;
// require_once __DIR__ . '/../../vendor/autoload.php';
use app\lib\{Session, Db, Format};
class User
{
    public  Db $db;
    public Format $fm;
    public string $firstName,  $lastName,  $mail,  $password;
    private const QUERY = "INSERT INTO users (firstname, lastname, mail, password) VALUES ('$firstName', '$lastName', '$mail', '$password')";

    // public function __construct($db)
    // {
    //     $this->db = new Db ();
    //     $this->fm = new Format ();
    // }
    public function userRegistration ()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->fm = new Format($_POST);
            $errors = $this->fm->validate();
        
            if (empty($errors)) {
                // Proceed with registration
                // For example, insert data into database
                return $this->db = new Db;
                $this->db->insertRecord($this->QUERY);

            } else {
                // Display errors to the user
            }
        }
        // $firtsName = $this->fm->validation($firstName);
        // $lastName = $this->fm->validation($lastName);
        // $mail = $this->fm->validation($mail);
        // $password = $this->fm->validation($password);
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
