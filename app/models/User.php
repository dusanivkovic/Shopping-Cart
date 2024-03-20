<?php
namespace app\models;
// require_once __DIR__ . '/../../vendor/autoload.php';
use app\lib\{Session, Db, Format};

class User extends Model
{
    // public  Db $db;
    public Format $fm;
    // public Model $model;

    public function setFormat (Format $fm): Format
    {
        return $this->fm = $fm;
    }

    // public function setDataBase (Db $db): Db
    // {
    //     return $this->db = $db;
    // }

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

    public function setUserSession ()
    {
        Session::set('user', serialize($this));
    }


}
