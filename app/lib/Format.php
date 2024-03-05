<?php
namespace app\lib;
// require_once __DIR__ . '/../../vendor/autoload.php';

class Format 
{
	private $data;
	private $errors = [];

	public function __construct($postData)
	{
		$this->data = $postData;
	}
    public function validate()
    {
		$this->validateFirstname();
		$this->validateLastName();
        $this->validateEmail();
        $this->validatePassword();

        return $this->errors;
	}

	private function validateFirstname() {
        $firstName = trim($this->data['firstname']);

        if (empty($firstName)) {
            $this->addError('firstname', 'First name is required');
        } 
    }

	private function validateLastName() {
        $lastName = trim($this->data['lastname']);

        if (empty($lastName)) {
            $this->addError('lastname', 'Last name is required');
        } 
    }

    private function validateEmail() {
        $email = trim($this->data['email']);

        if (empty($email)) {
            $this->addError('email', 'Email is required');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Invalid email format');
        }
    }

    private function validatePassword() {
        $password = $this->data['password'];

        if (empty($password)) {
            $this->addError('password', 'Password is required');
        } elseif (strlen($password) < 8) {
            $this->addError('password', 'Password must be at least 8 characters long');
        }
    }

    private function addError($key, $message) {
        $this->errors[$key] = $message;
    }
}