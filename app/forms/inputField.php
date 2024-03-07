<?php
namespace app\forms;

use app\lib\Session;

class inputField extends BaseInput
{
  public function renderInput(): string
  {
      return sprintf('<input type="%s" id="nastavnik" name="%s" value="%s" class="form-control %s %s" placeholder="%s"></div><div id="validationServerUsernameFeedback" class="valid-feedback">
      Please choose a username.
    </div>', 
    $this->type, 
    $this->name, 
    $this->value, 
    $this->bootstrapClass, 
    unserialize(Session::get('user')) ? 'is-invalid' : 'is-valid', 
    // '',
    $this->placeholder);
  }
}