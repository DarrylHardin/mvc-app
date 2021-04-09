<?php
/**
 * App Core Class
 * Creates URL and loads Core Controller
 * URL FORMAT /Controller/Method/Params
 */

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->getUrl();
    }

    public function getUrl()
    {
        echo $_GET['url'];
    }
}
