<?php

// Load configs from config.ini
$config_ini = parse_ini_file(base_path('/configs/config.ini'), true);

$config = require base_path('/configs/config.php');    

$db = new Database(
        config: $config['dadabase'],
        username: $config_ini['database']['username'], 
        password: $config_ini['database']['password']
    );




$currentUserId = 4; //replace with logged-in user ID

$notes = $db->query('SELECT * FROM notes WHERE user_id=' . $currentUserId)->get();


    view('notes/index.view.php', [
        'heading' => 'My Notes',
        'notes' => $notes
    ]);