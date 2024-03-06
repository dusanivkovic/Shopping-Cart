<?php
namespace app\forms;
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
    $this->fm->hasError($this->name) ? 'is-invalid' : 'isvalid', 
    $this->placeholder);
  }
}