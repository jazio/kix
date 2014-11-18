<?php
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
var_dump($_POST);
use \lib\User;
use \lib\FormValidator;
use \lib\Connector;

if (isset($_POST['submit'])) {
    // prepare the dependency injection
    $field = new FormValidator();
    $db = new Connector();


    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if ($field->isValid($username) && $field->isValid($password) && $field->isValid($email)) {
        $user = new User($db);
        $password = $user->setPassword($password);
        $user->register($username, $email, $password);
    }
}

else {
    echo $twig->render('signin.twig', array('name' => 'Fabien'));
}

