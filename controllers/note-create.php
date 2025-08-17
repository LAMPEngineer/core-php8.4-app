<?php

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

    if(empty($_POST['body']))
        $errors['body'] = 'The body of the note is required.';
    

    if(strlen($_POST['body']) > 1000)
        $errors['body'] = 'The body can not be more than 1000 character.';

    

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
