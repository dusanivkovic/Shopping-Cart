<?php
namespace app\forms;
abstract class BaseSelect extends HtmlElement
{
    public string $name;
    public string $label;
    public string $text;
    public string $for;
    public string $bootstrapClass;
    public array $option;

    public function  __construct(array $option, string $name, string $label = '', string $for = '', string $bootstrapClass = 'col-md-4')
    {
        $this->option = $option;
        $this->name = $name;
        $this->label = $label;
        $this->for = $for;
        $this->bootstrapClass = $bootstrapClass;
    }

    public function render(): string
    {
        return sprintf('
        <div class="%s">
            <label for="%s" class="form-check-label">%s</label>%s', $this->bootstrapClass, $this->for, $this->label, $this->renderSelect($this->option));
    }

    abstract public function renderSelect ($arr): string;
}