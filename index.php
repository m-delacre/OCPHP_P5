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
        break;
    case 'postComment':
        $postController = new PostController();
        $postController->addComment();
        break;
    case 'contactForm':
        $viewController = new ViewController();
        $viewController->sendContactForm();
        break;
    case 'administration':
        $adminController = new AdminController();
        $adminController->displayAdministrationPage();
        break;
    case 'createPost':
        $adminController = new AdminController();
        $adminController->displayCreatePost();
        break;
    case 'postNewArticle':
        $adminController = new AdminController();
        $adminController->publishPost();
        break;
    case 'adminComment':
        $adminController = new AdminController();
        $adminController->displayPendingComment();
        break;
    case 'manageComment':
        $adminController = new AdminController();
        $adminController->manageComment();
        break;

    default:
        $viewController = new ViewController();
        $viewController->displayNotFound();
        break;
}
