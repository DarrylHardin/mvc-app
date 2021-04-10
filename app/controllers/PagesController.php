<?php 
    class PagesController extends BaseController
    {
        public function __construct()
        {
            
        }

        public function index()
        {
            $this->View('index');
        }

        public function about($id = null)
        {
            echo ' about ' . $id;
            
        }
    }