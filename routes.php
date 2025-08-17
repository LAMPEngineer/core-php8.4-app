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
        '/notes' => 'controllers/notes.php',
        '/note' => 'controllers/note.php',
        '/notes/create' => 'controllers/note-create.php',
        '/contact' => 'controllers/contact.php',
    ];
