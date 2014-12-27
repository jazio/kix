<?php

/**
 * Sign Up: Creating an account.
 */
require_once 'vendor/autoload.php';
require_once 'config/config.php';
require_once 'autoloader.php';

use \lib\User;
use \lib\FormValidator;
use \lib\Connector;

if (isset($_POST['submit'])) {
    // Prepare the dependency injection.
    $field = new FormValidator();
    $db = new Connector();


    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if ($field->isValid($username,'text') && $field->isValid($password, 'password') && $field->isValid($email,'email')) {

        try {
            $user = new User($db);
            $password = $user->setPassword($password);
            $user->register($username, $email, $password);
            echo $twig->render('home.twig', array('message' => 'Dear {$username} welcome to the brotherhood.'));
        }
        catch (Exception $e) {
            throw new \Exception('Cannot register.' . $e->getMessage());
        }
    } else {
        echo $twig->render('signup.twig', array('message' => 'Error ' .  $field->err2));
    }
}
// Render the form.
else {
    echo $twig->render('signup.twig', array('message' => 'Fill in the form to create your account.'));
}
