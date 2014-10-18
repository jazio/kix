<html>
    <head>Facekix Register
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
    <h2>Register</h2>
    <form action="" method="POST">
        <input type="text" name="username" id="username" placeholder='Choose a username' value=""/><br/>
        <input type="text" name="email" id="email" placeholder='Your Email' value=""/><br/>
        <input type="password" name="password" id="password" placeholder="Your Password" value=""/><br/>

        <input type="submit" name="submit" value="Register"/>
    </form>
    </body>
</html>
<?php
/**
 *
 * User: jazio
 * Date: 16.10.14
 * Time: 19:04
 */

// this is empty before form submittion
//var_dump($_POST);
require('User.php');
require('FormValidator.php');

if ($_POST['submit'] == 'Register') {

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