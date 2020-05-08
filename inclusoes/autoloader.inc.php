<?php

    spl_autoload_register('class_loader');

    function class_loader($className)
    {

        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        if (strpos($url, 'inclusoes') !== false)
            $path = '../class/';
        else
            $path = 'class/';

        $extension = '.class.php';
        $fullPath = $path . $className . $extension;

        if (!file_exists($fullPath))
            return false;

        require_once $fullPath;

    }

