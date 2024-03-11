<?php
namespace app\forms;
// use app\lib\Format;
use app\models\Model;

abstract class BaseInput extends HtmlElement
{
    public string $type;
    public string $label;
    public string $name;
    public string $for;
    public string $placeholder;
    public string $value;
    public string $bootstrapClass;
    public Model $model;
    public string $id;

    public function __construct(string $type, string $name, string $label = '', string $for ='', string $placeholder= '', string $value = '', string $bootstrapClass = 'col-md-4', Model $model)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->for = $for;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->bootstrapClass = $bootstrapClass;
        $this->model = $model;
        // $this->isValid = $isValid;
        // $this->model = $model;
    }

    public function render (): string
    {
        return sprintf('
            <div class="%s">
                <label for="%s" class="form-check-label">%s</label>%s', 
                $this->bootstrapClass, 
                $this->for, 
                $this->label, 
                $this->renderInput());
    }


    abstract public function renderInput (): string;
}