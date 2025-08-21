<?php
/** 
 * Route for controllers.
 * This file contains the routing logic for the application.
 * It maps URIs to their corresponding controller files.
 * 
 * @package Core-PHP8.4-App
 * @version 1.00
 */

namespace Core;

use Core\Response;
use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

class Router 
{

  protected $routes = [];

  public function add(
    string $method, 
    string $uri, 
    string $controller) : Router
  {
    $this->routes[] =  [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null, // Default middleware is null
    ];

    return $this;

  }

  public function get($uri, $controller) : Router
  {
    return $this->add(
      method:'GET', 
      uri: $uri, 
      controller: $controller);

  }

  public function post($uri, $controller) : Router
  {
    return $this->add(
      method:'POST', 
      uri: $uri, 
      controller: $controller);
  }

  public function delete($uri, $controller) : Router
  {
    return $this->add(
      method:'DELETE', 
      uri: $uri, 
      controller: $controller);
  }

  public function put($uri, $controller) : Router
  {
    return $this->add(
      method:'PUT', 
      uri: $uri, 
      controller: $controller);
  }

  public function patch($uri, $controller) : Router
  {
    return $this->add(
      method:'PATCH', 
      uri: $uri, 
      controller: $controller);
  }

  public function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;

    return $this;

  }

  public function route($uri, $method)
  {
   
    foreach ($this->routes as $route){

      if($route['uri'] === $uri && $route['method'] === strtoupper($method)){

        Middleware::resolve($route['middleware']);

        return require base_path($route['controller']);

      }
    }

    $this->abort();
  }

  protected function abort($code = Response::NOT_FOUND)
  {
        http_response_code($code);

        require base_path('views/'. $code . '.view.php');
        
        die();
  }

}