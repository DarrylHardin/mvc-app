<?php
/**
 * App Core Class
 * Creates URL and loads Core Controller
 * URL FORMAT /Controller/Method/Params
 */

class Core
{
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        // print_r($this->getUrl());

        $url = $this->getUrl();

        if($url)
        {
            // look in controllers for first value
            if(file_exists('../app/controllers/' . ucwords($url[0]). 'Controller.php'))
            {

                // if exists then set as controller
                $this->currentController = ucwords($url[0]);
                
                unset($url[0]);
            }
        }
        

        // append Controller to end of controller name for naming convention
        $this->currentController = $this->currentController . 'Controller';
        // print_r($this->currentController);

        require_once '../app/controllers/' . $this->currentController . '.php';

        /**
         * Instantiate Controller 
         *  ex pages = new Pages
         */
        $this->currentController = new $this->currentController;

        // check second url
        if(isset($url[1]))
        {
            // check method
            if(method_exists($this->currentController, $url[1]))
            {
                $this->currentMethod = $url[1];
                
                unset($url[1]);
            }
            
        }
        // echo $this->currentMethod;

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback array of params
        call_user_func_array([
            $this->currentController,
            $this->currentMethod,],
            $this->params
        );
    }

    public function getUrl()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
