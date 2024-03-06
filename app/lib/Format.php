<?php
namespace app\lib;
// require_once __DIR__ . '/../../vendor/autoload.php';

class Format 
{
	public $data;
	public $errors = [];

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
        $firstName = $this->validation($this->data['firstname']);

        if (empty($firstName)) {
            $this->addError('firstname', 'First name is required');
        } 
    }

	private function validateLastName() {
        $lastName = $this->validation($this->data['lastname']);

        if (empty($lastName)) {
            $this->addError('lastname', 'Last name is required');
        } 
    }

    private function validateEmail() {
        $email = $this->validation($this->data['email']);

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

    public function validation($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    private function addError($key, $message) {
        $this->errors[$key] = $message;
    }

    public function getErrors (): array
    {
        return $this->errors;
    }

    public function getFirstError($attribute)
    {
        $errors = $this->errors[$attribute] ?? [];
        return $errors[0] ?? '';
    }

    public function hasError ($attributes)
    {
        return $this->errors[$attributes] ?? false;
    }
}