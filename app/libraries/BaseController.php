<?php
/**
 * Base Controller
 * Loads Models and views
 */
    class BaseController{
        // load model
        public function model($model)
        {
            //require model
            require_once '../app/models/' . $model . '.php';

            // Instantiate model
            return new $model();

        }

        // load view
        public function View($view, $data = [])
        {
            //check for view file
            if(file_exists('../app/views/' . $view . '.php'))
            {
                require_once '../app/views/' . $view . '.php';
            }
            else 
            {
                die("view does not exist");
            }
        }
    }