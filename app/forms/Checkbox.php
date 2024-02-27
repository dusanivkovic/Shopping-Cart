<?php
namespace app\forms;
class Checkbox extends BaseInput
{
    public function renderInput(): string
    {
        return sprintf('
                <div class="form-check">
                    <input id="%s" class="form-check-input" type="checkbox" name="%s" value="%s">
                </div>
            </div>', $this->id, $this->name, $this->value);
    }
}