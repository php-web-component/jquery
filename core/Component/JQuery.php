<?php namespace PWC\Component;

use PWC\AssetsManager\Config;
use PWC\BuilderTrait;
use PWC\Component;
use PWC\Component\Html\Body;
use PWC\Component\Html\Head;
use PWC\Component\Html\Script;
use PWC\Component\Html\Title;

class JQuery extends Component
{
    protected $_ID = 'pwc-jquery';

    protected $html = [];
    protected $head = [];
    protected $body = [];
    protected $title = 'JQuery';

    public function render(): string
    {
        return (string) Html::build(
            Head::build(
                Title::build(Text::build($this->title)),
            )->decorate($this->head),
            Body::build(
                parent::render(),
                Script::register(Config::get('dir') . 'php-web-component/jquery/jquery.min.js'),
            )->decorate($this->body),
        )->decorate($this->html);
    }

    use BuilderTrait;
}
