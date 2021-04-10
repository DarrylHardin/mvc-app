<?php 
    class PagesController extends BaseController
    {
        public function __construct()
        {
            echo 'pages loaded';
        }

        public function index()
        {
            $this->View('hello');
        }

        public function about($id = null)
        {
            echo ' about ' . $id;
            
        }
    }