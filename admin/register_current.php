<?php

include_once "../utils/regex.php";

include_once "./partials/top.php";

$errors = [];
$successes = [];

/* (1) Is method allowed (POST or GET ?) */

/* (2) All fields input validation : required ? expected format ? */

/* (3) Password handling */

$password = $_POST['password'];
$passwordConfirm = $_POST['password_confirm'];

if ($password === $passwordConfirm) {
        /**
         * Regular Expressions
         * - W3Schools: https://www.w3schools.com/php/php_regex.asp
         * 
         * Hashing and salting
         * - PHP manual: https://www.php.net/manual/fr/faq.passwords.php
         * - Medium (article): https://medium.com/@mrityunjay.webmaster/how-to-secure-hash-and-salt-for-php-passwords-54f1c9d268a6 
         */
    if (preg_match($validPatterns['password_policy'], $password)) {
        // TODO: Hash and salt password
    } else {
        $errors[] = 'Le mot de passe doit respecter la politique de mot de passe.';
    }
} else {
    $errors[] = 'Le mot de passe de confirmatioon ne correspond pas.';
}

include_once "./partials/bottom.php";
