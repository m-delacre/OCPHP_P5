<?php

class AdminController
{
    public function displayAdministrationPage()
    {
        if($this->isAdmin()){
            $view = new View();
            $view->render('./view/administrationpage.php');
        }else{
            $view = new View();
            $view->render('./view/errorpage.php');
        }
    }

    public function isAdmin(): bool
    {
        if(isset($_SESSION['user_isAdmin']) && $_SESSION['user_isAdmin']){
            return true;
        }else{
            return false;
        }
    }

    public function displayCreatePost()
    {
        if($this->isAdmin()){
            $view = new View();
            $view->render('./view/createpostpage.php');
        }else{
            $view = new View();
            $view->render('./view/errorpage.php');
        }
    }

    public function publishPost()
    {
        $adminManager = new AdminManager(DatabaseConnection::getInstance());
        $adminManager->postArticle($_SESSION['user_id'], $_POST['title'], $_POST['chapo'], $_POST['content']);
        $view = new View();
        $view->render('./index.php?action=blog');
    }

    public function displayPendingComment()
    {
        $commentManager = new CommentManager(DatabaseConnection::getInstance());
        $comments = $commentManager->getListPendingComment();
        $view = new View();
        $view->render('./view/admincomment.php', ['comments' => $comments]);
    }

    public function manageComment()
    {
        $adminManager = new AdminManager(DatabaseConnection::getInstance());
        $adminManager->updateComment($_GET['commentID'],$_POST['is_visible']);
        header('Location: ' . './index.php?action=showPost&id=' . $_GET['articleID']);
    }
}