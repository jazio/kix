<?php
require_once 'vendor/autoload.php';
require_once 'autoloader.php';
// Twig
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
    'debug' => true,
));
$twig->addExtension(new Twig_Extension_Debug());
