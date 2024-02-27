<?php
namespace app\forms;
class DateInput extends BaseInput
{
    public function renderInput(): string
    {
        return sprintf('<input type="week" class="form-control" id="sedmica" name="%s" min="2024-W03" max="2024-W24"></div>', $this->name);
    }
}