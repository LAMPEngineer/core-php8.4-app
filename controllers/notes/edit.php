<?php

namespace Controllers\Notes;

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$currentUserId = 4; //replace with logged-in user ID
$id = $_GET['id'];


$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id
    ])->findOrFail();

// Check if the note belongs to the current user
authorize($note->user_id === $currentUserId);



view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'note' => $note,
        'errors' => []
    ]);