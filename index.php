<?php
spl_autoload_register(function ($className) {
    $classFilePath = 'classes/' . $className . '.php';
    if (file_exists($classFilePath)) {
        include_once $classFilePath;
        return true;
    }
    return false;
});

Main::init();