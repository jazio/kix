<?php
/**
 * Sign In
 */
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
    $username = $_POST['username'];
    $password = $_POST['password'];


            if ($field->isValid($username,'text') && $field->isValid($password,'password')) {
                $user = new User($db);

                try {
                    $q = $user->login($username, $password);
                    if ($q >= 1) {
                        session_start();
                        $_SESSION['login'] = 1;
                        echo $twig->render('home.twig', array(
                            'user' => $username,
                            'message' => "Dear {$username} welcome inside.",
                        ));
                    }
                }
                catch (Exception $e) {
                    //$e->getMessage()
                    echo $twig->render('signin.twig', array('message' => 'Username and password not valid.'));
                    //throw new \Exception('Cannot login.' . $e->getMessage() . '<br/>' . $field->err);
                }


            }
            else {
                echo $twig->render('signin.twig', array('message' => 'Fill in the empty fields'));
            }

    } else {
        echo $twig->render('signin.twig');
    }
