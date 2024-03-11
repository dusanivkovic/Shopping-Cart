<?php
namespace app\forms;

use app\lib\Session;
use app\models\Model;

class InputField extends BaseInput
{
  // public Model $model;

  public function renderInput(): string
  {
    return sprintf('<input type="%s" id="nastavnik" name="%s" value="%s" class="form-control %s %s" placeholder="%s"></div><div id="validationServerUsernameFeedback" class="valid-feedback">
    Please choose a username.
    </div>', 
    $this->type, 
    $this->name, 
    $this->value, 
    $this->bootstrapClass, 
    $this->model->hasError('password') ? 'is-invalid' : 'is-valid',
    // '',
    $this->placeholder
    );
  }
}