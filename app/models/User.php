<?php
namespace app\models;
// require_once __DIR__ . '/../../vendor/autoload.php';
use app\lib\{Session, Db, Format};
class User
{
    public  Db $db;
    public Format $fm;

    // public string $firstName,  $lastName,  $mail,  $password;

    public function userValidation ()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->fm = new Format($_POST);
            $errors = $this->fm->validate();
       
            if (empty($errors)) {
                // Proceed with registration
                // For example, insert data into database
                $this->db = new Db;
            } else {
                // Display errors to the user
                // echo isset($errors['firstname']) ? $errors['firstname'] : '';
                // header('location: ./../public/register.php');
            }
        }

    }

    public function getFirstName(): string
    {
        return $this->fm->data['firstname'];
    }
    
    public function setFirstName($userName): void
    {
        $this->fm->data['firstname'] = $userName;
    }

    public function getLastName(): string
    {
        return $this->fm->data['lastname'];
    }

    public function setLastName($lastName): void
    {
        $this->fm->data['lastName'] = $lastName;
    }

    public function getMail(): string
    {
        return $this->fm->data['email'];
    }

    public function setMail($mail): void
    {
        $this->fm->data['email'] = $mail;
    }

    public function getPassword(): string
    {
        return $this->fm->data['password'];
    }

    public function setPassword($password): void
    {
        $this->fm->data['password'] = $password;
    }


}
