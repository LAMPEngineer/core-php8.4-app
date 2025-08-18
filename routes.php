<?php
/**
 * Router for the application.
 * This file contains the routing logic that maps URIs to their corresponding controller files.
 * 
 * @package Core-PHP8.4-App
 * @version 1.00
 */

    $router->get('/', 'controllers/index.php');
    $router->get('/about', 'controllers/about.php');
    $router->get('/contact', 'controllers/contact.php');


    $router->get('/notes', 'controllers/notes/index.php');
    $router->get('/note', 'controllers/notes/show.php');
    $router->delete('/note', 'controllers/notes/destroy.php');
    $router->get('/notes/create', 'controllers/notes/create.php');
    $router->post('/notes', 'controllers/notes/store.php');

