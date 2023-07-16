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
    case 'showPost':
        $postController = new PostController();
        $postController->displayPost();
        break;
    case 'connexion':
        $loginController = new LoginController();
        $loginController->displayLogin();
        break;
    case 'deconnexion':
        $loginController = new LoginController();
        $loginController->logout();
        break;
    case 'register':
        $loginController = new LoginController();
        $loginController->displayRegister();
        
    default:
        $viewController = new ViewController();
        $viewController->displayNotFound();
        break;
}
