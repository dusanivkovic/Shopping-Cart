<?php
namespace app\forms;
use app\lib\Format;
abstract class BaseInput extends HtmlElement
{
    public string $type;
    public string $label;
    public string $name;
    public string $for;
    public string $placeholder;
    public string $value;
    public string $bootstrapClass;
    public string $isValid;
    public string $id;
    public Format $fm;

    public function __construct(string $type, string $name, string $label = '', string $for ='', string $placeholder= '', string $value = '', string $bootstrapClass = 'col-md-4', string $isValid, Format $fm, string $id = '')
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->for = $for;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->bootstrapClass = $bootstrapClass;
        $this->isValid = $isValid;
        $this->fm = new Format($_POST);
        $this->id = $id;
    }

    public function render (): string
    {
        return sprintf('
            <div class="%s"><span></span>
                <label for="%s" class="form-check-label">%s</label>%s', $this->bootstrapClass, $this->for, $this->label, $this->renderInput());
    }

    abstract public function renderInput (): string;
}