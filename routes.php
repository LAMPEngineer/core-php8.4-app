<?php
/**
 * Router for the application.
 * This file contains the routing logic that maps URIs to their corresponding controller files.
 * 
 * @package Core-PHP8.4-App
 * @version 1.00
 */
    return [
        '/' => 'controllers/index.php',
        '/about' => 'controllers/about.php',
        '/notes' => 'controllers/notes/index.php',
        '/note' => 'controllers/notes/show.php',
        '/notes/create' => 'controllers/notes/create.php',
        '/contact' => 'controllers/contact.php',
    ];
