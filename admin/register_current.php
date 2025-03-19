<?php

include_once "./partials/top.php";

$errors = [];

/* (1) Is method allowed (POST or GET ?) */

/* (2) All fields input validation (required ? + format) */

/* (3) Password handling */

$password = $_POST['password'];
$passwordConfirm = $_POST['password_confirm'];

if ($password === $passwordConfirm) {
    $passwordPattern = '^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[^\ ])(?=.*[\$\#]).{10,}$';
    if (preg_match($passwordPattern, $password)) {
        

    } else {
        $errors[] = 'Le mot de passe doit respecter la politique de mot de passe.';
    }
} else {
    $errors[] = 'Les mots de passe ne correspondent pas.';
}


include_once "./partials/bottom.php";
