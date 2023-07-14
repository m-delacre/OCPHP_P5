<?php
require_once('./config/autoload.php');
require_once('./config/config.php');

session_start();

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
    case 'blog':
        $postController = new PostController();
        $postController->displayListPost();
        break;
    case 'connexion':
        $loginController = new LoginController();
        $loginController->displayLogin();
        break;
    case 'deconnexion':
        $loginController = new LoginController();
        $loginController->logout();
        break;
        
    default:
        $viewController = new ViewController();
        $viewController->displayNotFound();
        break;
}
