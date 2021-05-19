<?php


class Page
{
    public $templateFile;
    public $pageFile;

    public function __construct($pageFile, $templateFile = 'html/main_template.php')
    {
        if($templateFile !== null){
            $this->templateFile = $templateFile;
        }
        $this->pageFile = $pageFile;
    }

    public function render($data = null){
        include_once $this->templateFile;
    }
}