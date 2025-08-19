<?php

namespace Controllers\Notes;

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);


$currentUserId = 4; //replace with logged-in user ID

$notes = $db->query('SELECT * FROM notes WHERE user_id=' . $currentUserId)->get();


    view('notes/index.view.php', [
        'heading' => 'My Notes',
        'notes' => $notes
    ]);