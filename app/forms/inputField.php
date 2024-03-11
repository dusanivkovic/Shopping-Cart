<?php
namespace app\forms;

use app\lib\Session;
use app\models\Model;

class InputField extends BaseInput
{
  public function __construct(string $type, string $name, string $label = '', string $for ='', string $placeholder,  string $value = '', string $bootstrapClass = 'col-md-4', Model $model)
  {
    $this->type = $type;
    $this->name = $name;
    $this->value = $value;
    $this->placeholder = $placeholder;
    parent::__construct($label, $for, $bootstrapClass, $model);
  }

  public function renderInput(): string
  {
    return sprintf('<input type="%s" id="nastavnik" name="%s" value="%s" class="form-control %s" placeholder="%s"></div><div id="validationServerUsernameFeedback" class="valid-feedback">
    Please choose a username.
    </div>', 
    $this->type, 
    $this->name, 
    $this->value, 
    $this->model->hasError('password') ? 'is-invalid' : 'is-valid',
    // '',
    $this->placeholder
    );
  }
}