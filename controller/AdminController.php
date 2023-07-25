<?php

class AdminController
{
    public function displayAdministrationPage()
    {
        AdminController::checkAdmin();
        $view = new View();
        $view->render('./view/administrationpage.php');
    }

    public static function isAdmin(): bool
    {
        if (isset($_SESSION['user_isAdmin']) && $_SESSION['user_isAdmin']) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkAdmin()
    {
        if (!isset($_SESSION['user_isAdmin']) || !$_SESSION['user_isAdmin']) {
            throw new Exception("vous devez être admin pour accéder à cette page.");
        }
    }

    public function displayCreatePost()
    {
        AdminController::checkAdmin();
        $view = new View();
        $view->render('./view/createpostpage.php');
    }

    public function publishPost()
    {
        $adminManager = new AdminManager(DatabaseConnection::getInstance());
        $adminManager->postArticle($_SESSION['user_id'], $_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['is_visible']);
        header('Location: ' . './index.php?action=blog');
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
        $adminManager->updateComment($_GET['commentID'], $_POST['is_visible']);
        header('Location: ' . './index.php?action=showPost&id=' . $_GET['articleID']);
    }

    public function displayUpdatePost()
    {
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $post = $postManager->getPost($_GET['articleId']);
        $view = new View();
        $view->render('./view/updatearticlepage.php', ['post' => $post]);
    }

    public function updateArticle()
    {
        $adminManager = new AdminManager(DatabaseConnection::getInstance());
        $adminManager->updateArticle($_GET['id'], $_POST['title'], $_POST['chapo'], $_POST['content'], $_POST['is_visible']);
        header('Location: ' . './index.php?action=blog');
    }

    public function displayAdminArticle()
    {
        AdminController::checkAdmin();
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $posts = $postManager->getAllPost();
        $view = new View();
        $view->render('./view/adminarticlepage.php', ['posts' => $posts]);
    }
}
