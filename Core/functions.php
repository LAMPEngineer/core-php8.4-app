<?php
/**
 * Functions file for utility functions.
 * This file contains various utility functions used throughout the application.
 * 
 * @package Core-PHP8.4-App
 * @version 1.00
 */
    
    use Core\Response;

    // Die and dump function for debugging   
    function dd($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>'; 

        die();
    }

    // Function to check if the current URL matches a given value
    function urlIs(string $value) : bool 
    {
        return $_SERVER['REQUEST_URI'] === $value;
    }


    // Function to handle aborting the request with a specific HTTP status code
    function abort($code = Response::NOT_FOUND) 
    {
        
        http_response_code($code);

        require base_path('views/'. $code . '.view.php');
        
        die();
    }


    // Function to check if authorization condition is not true, abort with a specific status code
    function authorize(bool $condition, $status = Response::FORBIDDEN) 
    {

        if (!$condition) abort($status);
    }


    function base_path($path)
    {
        return BASE_PATH . $path;   
    }


    function view($view, $data = [])
    {
        extract($data);
        require base_path('views/' . $view);
    }