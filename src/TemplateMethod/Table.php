<?php

namespace App\TemplateMethod;

abstract class Table
{
    protected $header = [];
    protected $body = [];

    protected abstract function outputHeader();
    protected abstract function outputBody();

    public function setHeader(array $header)
    {
        $this->header = $header;
    }

    public function setBody(array $body)
    {
        $this->body = $body;
    }

    public function display()
    {
        $header = $this->outputHeader();
        $body = $this->outputBody();
        echo $header . $body;
    }
}