<?php
namespace app\forms;
abstract class HtmlElement 
{
    abstract public function render (): string;
}