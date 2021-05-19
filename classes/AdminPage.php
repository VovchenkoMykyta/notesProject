<?php


class AdminPage extends Page
{
    public $templateFile = 'admin.php';
    public $pageFile = 'admin.php';

    public function __construct($pageFile,$templateFile)
    {
        parent::__construct($pageFile,$templateFile);
    }
}