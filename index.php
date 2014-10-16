<?php
/**
 * Created by PhpStorm.
 * User: jazio
 * Date: 16.10.14
 * Time: 19:04
 */

require ('User.php');

$jaap = new User();
$jaap->setPassword('tes');
$jaap->setEmail('jaap@email.org');
var_dump($jaap);