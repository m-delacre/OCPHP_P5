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
            //throw new Exception("vous devez être admin pour accéder à cette page.");
            header('Location: ' . './index.php?action=notAuthorized');
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
        $adminManager->postArticle($_SESSION['user_id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['chapo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['is_visible']));
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
        $adminManager->updateArticle($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['chapo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['is_visible']));
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

    public function displayDeleteArticle()
    {
        AdminController::checkAdmin();
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $post = $postManager->getPost($_GET['id']);
        $view = new View();
        $view->render('./view/deletearticlepage.php', ['post' => $post]);
    }

    public function deleteArticle()
    {
        AdminController::checkAdmin();
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $postManager->deleteArticle($_GET['id']);
        $this->displayAdminArticle();
    }
}
