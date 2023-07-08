<?php
require_once('./config/autoload.php');
require_once('./config/config.php');

/**
 * URL parameter 'action' is used in the rooter below
 * default: home
 */
$action = $_REQUEST['action'] ?? 'home';

/**
 * rooter
 */
switch ($action) {
    case 'home':
        $viewController = new ViewController();
        $viewController->displayHome();
        break;
    case 'allPost':
        # code...
        break;
    case 'about':
        # code...
        break;
    
    default:
        $viewController = new ViewController();
        $viewController->displayNotFound();
        break;
}
