<?php
session_start();
require_once 'vendor/autoload.php';

//@todo move them to config
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

/**
 *
 * User: jazio
 * Date: 16.10.14
 * Time: 19:04
 */
require('autoloader.php');
// this is empty before form submittion
//var_dump($_POST, 'post');

use \lib\User;
use \lib\FormValidator;
use \lib\Connector;

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
        $q = $user->login($_POST['username'], $_POST['password']);
        var_dump($q);
    }

    else {
        $message = 'Your credentials are not valid';
    }
} else {
    echo $twig->render('signin.twig', array('name' => 'Fabien'));
}

