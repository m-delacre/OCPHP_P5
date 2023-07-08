<?php

class ViewController
{
    public function displayHome()
    {
        $view = new View();
        $homePage = $view->render('./view/homepage.php');
    }

    public function displayNotFound()
    {
        $view = new View();
        $homePage = $view->render('./view/errorpage.php');
    }
}