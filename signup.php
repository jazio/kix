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
            if(!empty($password)) {
                $password = $user->setPassword($password);
            }
            $q = $user->register($username, $email, $password);
            if ($q > 0) {
                echo $twig->render('home.twig', array('message' => 'Welcome to the brotherhood.'));
            }
            else {
                echo $twig->render('signup.twig', array('message' => 'Please fill in the form'));
            }
        }
        catch (Exception $e) {
            
            echo $twig->render('signup.twig', array('message' => 'Cannot register'. $e->getMessage()));
            //throw new \Exception('Cannot register.' . $e->getMessage());
        }
   }
}
// Render the form.
else {
    echo $twig->render('signup.twig', array('message' => 'Fill in the form to create your account.'));
}
