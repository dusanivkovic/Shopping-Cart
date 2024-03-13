<?php

namespace app\models;
use app\lib\{Db, Format};
class Model
{
    public array $errors = [];
    public $data;
    public array $attributes = [];
    const FIRST_NAME = 'First name is required';
    const LAST_NAME = 'Last name is required';
    const PASSWORD_REQUIRED = 'Password is required';
    const PASSWORD_MIN = 'Password must be at least 8 characters long';
    const EMAIL_REQUIRED = 'Email is required';
    const EMAIL_FORMAT = 'Invalid email format';
    

    public function validate()
    {
		$this->validateFirstname();
		$this->validateLastName();
        $this->validateEmail();
        $this->validatePassword();

        return $this->errors;
	}

    public function validateLogin()
    {
        $this->validateEmail();
        $this->validatePassword();

        return $this->errors;
	}

    public function validation($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function validateFirstname() {
        $firstName = $this->validation($this->data['firstname']);
        empty($firstName) ? $this->addError('firstname', self::FIRST_NAME) : '';
    }

	protected function validateLastName() {
        $lastName = $this->validation($this->data['lastname']);
        empty($lastName) ? $this->addError('lastname', self::LAST_NAME) : '';
    }

    protected function validateEmail() {
        $email = $this->validation($this->data['email']);

        if (empty($email)) {
            $this->addError('email', self::EMAIL_REQUIRED);
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', self::EMAIL_FORMAT);
        }
    }

    protected function validatePassword() {
        $password = $this->data['password'];

        if (empty($password)) {
            $this->addError('password', self::PASSWORD_REQUIRED);
        } elseif (strlen($password) < 8) {
            $this->addError('password', self::PASSWORD_MIN);
        }
    }

    public function addError($key, $message) {
        $this->errors[$key] = $message;
    }

    public function getErrors (): array
    {
        return $this->errors;
    }

    public function getFirstError($attribute)
    {
        $errors = $this->errors[$attribute] ?? [];
        return $errors ?? '';
    }

    public function hasError ($attributes)
    {
        return $this->errors[$attributes] ?? false;
    }
    
}