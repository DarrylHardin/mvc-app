<?php 
    /**
     * Controllers must end with "Controller"
     */
    class PagesController extends BaseController
    {
        public function __construct()
        {
            // EXAMPLE USING MODEL POST
            // on Pages load get database from model
            $this->postModel = $this->model('Post');
        }

        public function index()
        {
            $posts = $this->postModel->getPosts();
            $data = [
                'title' => 'Welcome',
                'posts' => $posts,
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