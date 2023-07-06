<?php
spl_autoload_register(function($className){
    if(file_exists('controller/' . $className . '.php'))
    {
        echo 'booooo';
        require_once('controller/' . $className . '.php');
        return;
    }
    if(file_exists('model/' . $className . '.php'))
    {
        require_once('model/' . $className . '.php');
        return;
    }
    if(file_exists('view/' . $className . '.php'))
    {
        require_once('view/' . $className . '.php');
        return;
    }
});