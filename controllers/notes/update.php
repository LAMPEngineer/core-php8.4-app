<?php

namespace Controllers\Notes;

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);


$currentUserId = 4; //replace with logged-in user ID

$id = $_POST['id']; // Get the ID of the note to update

// Fetch the note by ID
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id
    ])->findOrFail();


// Check if the note belongs to the current user
authorize($note->user_id === $currentUserId);

$errors = [];

// Validate the body of the note
if(! Validator::string(value: $_POST['body'], min: 1, max: 1000))
    $errors['body'] = 'A body of no more than 1000 character is required.';


// If there are validation errors, return to the edit view with errors
if(count($errors)) {

   return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// Update the note in the database
$db->query('UPDATE notes SET body = :body WHERE id = :id',
    [
        'id' => $id,
        'body' => trim($_POST['body'])
    ]);


// Redirect to the notes index page after updating
header('Location: /notes');
exit();