<?php
namespace app\lib;

use app\models\Model;

// require_once __DIR__ . '/../../vendor/autoload.php';

class Format extends Model
{
	// public $data;
	// public $errors = [];

	public function __construct($postData)
	{
		$this->data = $postData;
	}
    // public function validate()
    // {
	// 	$this->validateFirstname();
	// 	$this->validateLastName();
    //     $this->validateEmail();
    //     $this->validatePassword();

    //     return $this->errors;
	// }

}