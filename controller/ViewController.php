<?php

class ViewController
{
    public function displayHome()
    {
        $view = new View();
        $view->render('./view/homepage.php');
    }

    public function displayNotFound()
    {
        $view = new View();
        $view->render('./view/errorpage.php');
    }

    public function sendContactForm()
    {
        if (isset($_POST['email'], $_POST['prenom'], $_POST['nom'], $_POST['message'])) {
            if(MDMail::sendMail(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['message'])) ){
                header('Location: ' . './index.php?action=home&emailsucceed');
            }else{
                header('Location: ' . './index.php?action=home&emailerror');
            }
        } else if (empty($_POST['email']) || empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['message'])) {
            header('Location: ' . './index.php?action=home&emailerror');
        }
    }

    public function displayNotAuthorized()
    {
        $view = new View();
        $view->render('./view/notauthorized.php');
    }
}
