<?php
namespace app\forms;
class Form extends HtmlElement
{
    protected array $elements = [];
    public string $action;
    public string $method;
    public string $id;

    public function __construct(string $action = '', $method = 'post', $id='form')
    {
        $this->action = $action;
        $this->method = $method;
        $this->id = $id;
    }
    
    public function addElement (HtmlElement $el)
    {
        $this->elements[] = $el;
    }

    public function render (): string
    {
        $content = implode(PHP_EOL, array_map(fn ($el) => $el->render(), $this->elements));
        return sprintf('
            <form id="%s" action="%s" method="%s" class="row g-3 align-items-center">
                %s
            </form>', $this->id, $this->action, $this->method, $content);
    }

}