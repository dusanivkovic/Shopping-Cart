<?php
namespace app\forms;
class Select extends BaseSelect
{
    public function renderSelect($arr): string
    {
        $options = implode(PHP_EOL, array_map(fn ($opt) => "<option value='$opt'>$opt", $arr));
        return sprintf('
            <select name="%s" class="form-select">%s</select>
        </div>', $this->name, $options);
    }
}