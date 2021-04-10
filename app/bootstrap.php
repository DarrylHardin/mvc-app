<?php 
    // Load Config
    require_once 'config/config.php';

    // Auto Load Core Libraries
    spl_autoload_register(function($classname){
        require_once 'libraries/' . $classname . '.php';
    });
