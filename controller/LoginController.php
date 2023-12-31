<?php

class LoginController
{
    /**
     * Display the connexion page
     * 
     * @return void
     */
    public function displayLogin()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $userManager = new UserManager(DatabaseConnection::getInstance());
            $user = $userManager->connexion($_POST['email']);
            if ($user != null) {
                if (htmlspecialchars($_POST['email']) === $user->getMail() && password_verify(htmlspecialchars($_POST['password']), $user->getPassword())) {
                    $_SESSION['user_pseudo'] = $user->getPseudo();
                    $_SESSION['user_id'] = $user->getId();
                    if ($user->getIsAdmin() === true) {
                        $_SESSION['user_isAdmin'] = true;
                    } else {
                        $_SESSION['user_isAdmin'] = false;
                    }
                    header('Location: ' . './index.php?action=home');
                }
            } else {
                $message = "Erreur dans les champs renseignés !";
                $view = new View();
                $view->render('./view/loginpage.php', ['message' => $message]);
            }
        } else {
            $view = new View();
            $view->render('./view/loginpage.php');
        }
    }

    
    /**
     * disconect the user and end the session
     * 
     * @return void
     */
    public function logout()
    {
        session_destroy();
        header('Location: ' . './index.php?action=home');
    }


    /**
     * display the registration page
     * 
     * @return void
     */
    public function displayRegister()
    {
        if (isset($_POST['email'], $_POST['password'], $_POST['lastName'], $_POST['firstName'], $_POST['pseudo'])) {
            $userManager = new UserManager(DatabaseConnection::getInstance());
            $userManager->registerUser(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['lastName']), htmlspecialchars($_POST['firstName']), htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['description']));
            header('Location: ' . './index.php?action=connexion');
        } else {
            $view = new View();
            $view->render('./view/registerpage.php');
        }
    }
}
