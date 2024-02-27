<?php
namespace app\forms;
class TextInput extends BaseInput
{
    public function renderInput(): string
    {
        return sprintf('<input type="text" id="nastavnik" name="%s" value="%s" class="form-control" placeholder="%s"></div>', $this->name, $this->value, $this->placeholder);
    }
}