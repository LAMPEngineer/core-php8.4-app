<?php
/** 
 * Route for controllers.
 * This file contains the routing logic for the application.
 * It maps URIs to their corresponding controller files.
 * 
 * @package Core-PHP8.4-App
 * @version 1.00
 */

    $routes = require 'routes.php';


    // Check if the requested URI exists in the routes
    function routeToController($uri, $routes): void {

        (array_key_exists($uri, $routes)) ? require $routes[$uri] : abort(Response::NOT_FOUND); 
      }


    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    
    routeToController($uri, $routes);
