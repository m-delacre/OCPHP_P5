<?php

class LoginController
{
    public function displayLogin()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $userManager = new UserManager(DatabaseConnection::getInstance());
            $user = $userManager->getUser($_POST['email'], $_POST['password']);
            if ($user != null) {
                $_SESSION['user_pseudo'] = $user->getPseudo();
                if ($user->getIsAdmin() === true) {
                    $_SESSION['user_isAdmin'] = true;
                } else {
                    $_SESSION['user_isAdmin'] = false;
                }
                header('Location: ' . './index.php?action=home');
            } else {
                $view = new View();
                $view->render('./view/loginpage.php');
            }
        } else {
            $view = new View();
            $view->render('./view/loginpage.php');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . './index.php?action=home');
    }
}
