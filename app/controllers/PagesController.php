<?php 
    class PagesController extends BaseController
    {
        public function __construct()
        {
            
        }

        public function index()
        {
            $data = [
                'title' => 'Welcome',
            ];
            $this->View('pages/index', $data);
        }

        public function about($id = null)
        {
            $data = [
                'title' => 'About',
            ];
            $this->View('pages/about', $data);
            
        }
    }