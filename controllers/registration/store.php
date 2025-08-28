<?php

namespace Controllers\Registration;

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator:: email($email)){
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator:: string($password, 7, 20)){
    $errors['password'] = 'Please provide a password of atleast seven charecters.';
}

if(! empty($errors)){
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    // user already exists, redirect to login page.
    header('Location:/login');
    exit();

} else{
    // create a new user
    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // marked as user has logged in.
    login([
        'email' => $email
    ]);

    
    header('Location:/notes');
    exit();
}