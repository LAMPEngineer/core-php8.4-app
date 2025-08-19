<?php
    /**
     *  frontend controller
     *  This file serves as the entry point for the application.
     *  It includes necessary files and handles routing.
     *  It also sets up error reporting for development purposes.
     *  @package Core-PHP8.4-App
     *  @version 1.00
     */

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    const BASE_PATH = __DIR__ . '/../';


    // Include the functions file for utility functions
    require BASE_PATH . 'Core/functions.php';

    spl_autoload_register(function ($class){

        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

        require base_path( $class . '.php');

    });

require base_path('bootstrap.php');

$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ??  $_SERVER['REQUEST_METHOD'];

//routeToController($uri, $routes);
$router->route($uri, $method);
