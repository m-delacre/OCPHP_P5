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
        if(isset($_POST['email'],$_POST['prenom'],$_POST['nom'],$_POST['message']))
        {
            $contactManager = new ContactManager();
            $contactManager->sendEmail($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['message']);
        }
        $view = new View();
        $view->render('./view/homepage.php');
    }

    public function displayNotAuthorized()
    {
        $view = new View();
        $view->render('./view/notauthorized.php');
    }
}