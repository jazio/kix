<?php
// @todo improve this as suggested here: https://r.je/php-psr-0-pretty-shortsighted-really.html
/*
 * Autoloader
 * The autoloader receive a path as argument following this pattern: \Vendor\Namespace\Classname
 */
function autoloader($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
}

spl_autoload_register('autoloader');