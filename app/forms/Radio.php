<?php
namespace app\forms;
class Radio extends BaseInput
{
    public function renderInput(): string
    {
        return sprintf(
            '   <div class="form-check">
                    <input type="radio" name="%s" value="%s" class="form-check-input">
                </div>
            </div>', $this->name, $this->value);
    }
}