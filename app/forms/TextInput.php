<?php
namespace app\forms;
class TextInput extends BaseInput
{
    public function renderInput(): string
    {
        return sprintf('<input type="%s" id="nastavnik" name="%s" value="%s" class="form-control %s" placeholder="%s"></div>', $this->type, $this->name, $this->value, $this->bootstrapClass, $this->placeholder);
    }
}