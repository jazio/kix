<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <?php include 'header.php'; ?>
    <div class="content">
    <h2>Sign In</h2>
    <form action="" method="POST">
        <input type="text" name="username" id="username" placeholder='Choose a username' value=""/><br/>
        <input type="password" name="password" id="password" placeholder="Your Password" value="" /><br/>

        <input type="submit" name="submit" value="Sign In"/>
    </form>
        </div>
    </body>
</html>
<?php
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

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    //var_dump($_SESSION, 'session');

    if ($field->isValid($username, 'text') && $field->isValid($password, 'password')) {
        $user = new User($db);
        $q = $user->login($username, $password);
        var_dump($q);
    }

    else {
        print 'out';
    }
}

