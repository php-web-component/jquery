<?php namespace PWC\Component;

class JQuery extends \PWC\Component
{
    public function render(): string
    {
        return (string) \PWC\Component\Html\Script::build([
            \PWC\AssetsManager\Config::get('dir') . 'php-web-component/jquery/jquery.min.js'
        ]);
    }

    use \PWC\BuilderTrait;
}
