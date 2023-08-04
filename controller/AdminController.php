<?php

class AdminController
{
    /**
     * Display the Administration page
     * 
     */
    public function displayAdministrationPage()
    {
        AdminController::checkAdmin();
        $view = new View();
        $view->render('./view/administrationpage.php');
    }

    /**
     * check if the user is admin
     * 
     */
    public static function checkAdmin()
    {
        if (!isset($_SESSION['user_isAdmin']) || !$_SESSION['user_isAdmin']) {
            header('Location: ' . './index.php?action=notAuthorized');
        }
    }

    /**
     * Display the creation post page
     * 
     */
    public function displayCreatePost()
    {
        AdminController::checkAdmin();
        $view = new View();
        $view->render('./view/createpostpage.php');
    }

    /**
     * call the manager to create the post and display the blog page
     * 
     */
    public function publishPost()
    {
        $adminManager = new AdminManager(DatabaseConnection::getInstance());
        $adminManager->postArticle($_SESSION['user_id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['chapo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['is_visible']));
        header('Location: ' . './index.php?action=blog');
    }

    /**
     * Display the page to manage comments
     * 
     */
    public function displayPendingComment()
    {
        $commentManager = new CommentManager(DatabaseConnection::getInstance());
        $comments = $commentManager->getListPendingComment();
        $view = new View();
        $view->render('./view/admincomment.php', ['comments' => $comments]);
    }


    /**
     * call the manager to set the visibility of a new comment
     * 
     */
    public function manageComment()
    {
        $adminManager = new AdminManager(DatabaseConnection::getInstance());
        if (is_numeric($_GET['commentID']) && isset($_POST['is_visible'])) {
            $adminManager->updateComment($_GET['commentID'], $_POST['is_visible']);
        }
        header('Location: ' . './index.php?action=showPost&id=' . $_GET['articleID']);
    }

    /**
     * Display the page to update a post
     * 
     */
    public function displayUpdatePost()
    {
        $postManager = new PostManager(DatabaseConnection::getInstance());
        if (isset($_GET['articleId']) && is_numeric($_GET['articleId'])) {
            $post = $postManager->getPost($_GET['articleId']);
        } else {
            $view = new View();
            $view->render('./view/errorpage.php');
        }

        $view = new View();
        $view->render('./view/updatearticlepage.php', ['post' => $post]);
    }

    /**
     * call the manager to update a post
     * 
     */
    public function updateArticle()
    {
        $adminManager = new AdminManager(DatabaseConnection::getInstance());
        $adminManager->updateArticle($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['chapo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['is_visible']));
        header('Location: ' . './index.php?action=blog');
    }

    /**
     * display the page with all the posts visible or not to manage them
     */
    public function displayAdminArticle()
    {
        AdminController::checkAdmin();
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $posts = $postManager->getAllPost();
        $view = new View();
        $view->render('./view/adminarticlepage.php', ['posts' => $posts]);
    }

    /**
     * Display the page to confirm is the user really want to delete this post
     * 
     */
    public function displayDeleteArticle()
    {
        AdminController::checkAdmin();
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $post = $postManager->getPost($_GET['id']);
        $view = new View();
        $view->render('./view/deletearticlepage.php', ['post' => $post]);
    }

    /**
     * call the manager to delete a post
     * 
     */
    public function deleteArticle()
    {
        AdminController::checkAdmin();
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $postManager->deleteArticle($_GET['id']);
        $this->displayAdminArticle();
    }
}
