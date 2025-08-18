<?php

namespace Controllers\Notes;

use Core\Database;
use Core\Validator;


// Load configs from config.ini
$config_ini = parse_ini_file(base_path('/config.ini'), true);

$config = require base_path('/config.php');    

$db = new Database(
        config: $config['dadabase'],
        username: $config_ini['database']['username'], 
        password: $config_ini['database']['password']
    );

$errors = [];

$currentUserId = 4; //replace with logged-in user ID

if(! Validator::string(value: $_POST['body'], min: 1, max: 1000))
    $errors['body'] = 'A body of no more than 1000 character is required.';


if(!empty($errors)) {

   return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

    
$db->query('INSERT INTO notes (user_id, body) VALUES (:user_id, :body)',
    [   
        'user_id' => $currentUserId,
        'body'    => trim($_POST['body'])
    ]
);

header('Location: /notes');
exit();


