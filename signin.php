<?php
/**
 * Sign In
 */

session_start();
require_once 'vendor/autoload.php';
require_once 'config/config.php';
require_once 'autoloader.php';

use \lib\User;
use \lib\FormValidator;
use \lib\Connector;

// @todo Asyncronous submit via Ajax http://cipriancociorba.com/php-form-validation-part-1-building-the-form/
if (isset($_POST['submit'])) {
    // prepare the dependency injection
    $field = new FormValidator();
    $db = new Connector();
    // Incorect only assign them to session if they are valid!!!
    /*$_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];*/
    //var_dump($_SESSION, 'session');

    if ($field->isValid($_POST['username'], 'text') && $field->isValid($_POST['password'], 'password')) {
        $user = new User($db);
        try {
        $q = $user->login($_POST['username'], $_POST['password']);
            echo $twig->render('home.twig', array(
                'message' => "Dear {$_POST['username']} welcome inside.",
                'user' => $_POST['username'],
            ));
        } catch (Exception $e){
            throw new \Exception('Cannot login.' . $e->getMessage(). '<br/>'. $field->err);
        }

    }
} else {
    echo $twig->render('signin.twig', array('name' => 'Fabien'));
}

