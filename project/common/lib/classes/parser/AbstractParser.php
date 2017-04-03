<?php
namespace common\lib\classes\parser;

abstract Class AbstractParser{

    protected $dom = '';

    public function load($file){
        $this->dom = $dom = new \DOMDocument();
        $this->dom->loadHTMLFile($file);
        return $this->dom;
    }

}