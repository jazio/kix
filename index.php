<?php

require_once 'vendor/autoload.php';


$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

echo $twig->render('layout.twig', array('name' => 'Fabien'));

