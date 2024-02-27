<?php
namespace app\forms;
class Button extends HtmlElement
{
    public string $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return sprintf('<div class="col-12"><button type="submit" value="" name="submit" class="btn btn-primary w-100">%s</button></div>', $this->text);
    }
}