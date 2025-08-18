<?php

namespace Controllers\Notes;

use Core\Database;

// Load configs from config.ini
$config_ini = parse_ini_file(base_path('/config.ini'), true);

$config = require base_path('/config.php');    

$db = new Database(
        config: $config['dadabase'],
        username: $config_ini['database']['username'], 
        password: $config_ini['database']['password']
    );


$currentUserId = 4; //replace with logged-in user ID
$id = $_POST['id'];


$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id
    ])->findOrFail();

// Check if the note belongs to the current user
authorize($note->user_id === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $id
]);

header('Location: /notes'); 
exit();