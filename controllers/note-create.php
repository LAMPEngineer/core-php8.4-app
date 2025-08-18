<?php

require 'Validator.php';
// Load configs from config.ini
$config_ini = parse_ini_file("./configs/config.ini", true);

$config = require './configs/config.php';    

$db = new Database(
        config: $config['dadabase'],
        username: $config_ini['database']['username'], 
        password: $config_ini['database']['password']
    );


$heading = 'Create Note';

$currentUserId = 4; //replace with logged-in user ID

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $errors = [];


    if(! Validator::string(value: $_POST['body'], min: 1, max: 1000))
        $errors['body'] = 'A body of no more than 1000 character is required.';
    

    
    if(empty($errors)){
        
        $db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)',
            [   
                'user_id' => $currentUserId,
                'body'    => $_POST['body']
            ]
        );
    }
    

}



require 'views/note-create.view.php';
