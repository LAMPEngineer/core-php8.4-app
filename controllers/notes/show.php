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
$id = $_GET['id'];


$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id
    ])->findOrFail();

// Check if the note belongs to the current user
authorize($note->user_id === $currentUserId);



    view('notes/show.view.php', [
        'heading' => 'Note Details',
        'note' => $note
    ]);