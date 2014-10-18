<html>
    <head>Facekix Register</head>
    <body>
    <h1>Register:</h1>
    <fieldset>
    <form action="" method="POST">
        <input type="text" name="username" value=""/><br/>
        <input type="text" name="email" value=""/><br/>
        <input type="password" name="password" value=""/><br/>
        <input type="submit" name="submit" value="Login"/>
    </form>
    </fieldset>
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
var_dump($_POST);

if ($_POST['submit'] == 'Login') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    require('User.php');

    $jaap = new User();
    $jaap->setUsername($username);
    $jaap->setPassword($password);
    $jaap->setEmail($email);
    $jaap->register($username, $email, $password);

    var_dump($jaap);

    //print_r($jaap->getUserList());
}