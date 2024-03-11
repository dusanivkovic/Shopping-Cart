<?php
namespace app\forms;

use app\models\Model;

abstract class HtmlElement extends Model
{
    abstract public function render (): string;
}