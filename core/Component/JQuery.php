<?php namespace PWC\Component;

use PWC\BuilderTrait;
use PWC\Component;
use PWC\Component\Html\Body;
use PWC\Component\Html\Head;
use PWC\Component\Html\Script;
use PWC\Component\Html\Title;
use PWC\Config\Asset;

class JQuery extends Component
{
    protected $_ID = 'pwc-jquery';

    protected ?Html $html;
    protected ?Head $head;
    protected ?Body $body;
    protected ?Title $title;

    public function render(): string
    {
        return (string) ($this->html ?? Html::build(
            ($this->head ?? Head::build(
                ($this->title ?? Title::build(
                    Text::build('JQuery'),
                ))->withDecorators($this->_decorators),
            ))->withDecorators($this->_decorators),
            ($this->body ?? Body::build(
                parent::render(),
                Script::register(Asset::get('dir') . 'php-web-component/jquery/jquery.min.js'),

                ...$this->_decorators->get(),
            ))->withDecorators($this->_decorators),
        ))->withDecorators($this->_decorators);
    }

    use BuilderTrait;
}
