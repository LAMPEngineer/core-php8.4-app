<?php

namespace Controllers\Sessions;

use Core\Validator;
use Core\App;
use Core\Database;



$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator:: email($email)){
    $errors['email'] = 'Please provide a valid email address.';
}

if (! Validator:: string($password)){
    $errors['password'] = 'Please provide a valid password.';
}

if(! empty($errors)){
    return view('sessions/create.view.php', [
        'errors' => $errors
    ]);
}


$db = App::resolve(Database::class);


// log in the user if the credientials match.

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();


if($user){
    
    if( password_verify($password, $user->password) ){

        login([
            'email' => $email
        ]);

        //redirect to home page
        header('Location:/');
        exit();
    }
    
}


return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);




  