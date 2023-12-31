<?php

class AdminController
{
    /**
     * Display the Administration page
     * 
     * @return void
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
     * @return void
     */
    public static function checkAdmin()
    {
        if (!isset($_SESSION['user_isAdmin']) || !$_SESSION['user_isAdmin']) {
            header('Location: ' . './index.php?action=notAuthorized');
        }
    }


    /**
     * check if the user is admin
     * 
     * @return bool
     */
    public static function isAdmin(): bool
    {
        if (isset($_SESSION['user_isAdmin']) && $_SESSION['user_isAdmin']) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Display the creation post page
     * 
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
     */
    public function displayUpdatePost()
    {
        if (isset($_GET['articleId']) && is_numeric($_GET['articleId'])) {
            $postManager = new PostManager(DatabaseConnection::getInstance());
            $post = $postManager->getPost($_GET['articleId']);
            $adminManager = new AdminManager(DatabaseConnection::getInstance());
            $authors = $adminManager->getAllAdmin();
        } else {
            $view = new View();
            $view->render('./view/errorpage.php');
        }
        $view = new View();
        $view->render('./view/updatearticlepage.php', ['post' => $post, 'authors' => $authors]);
    }


    /**
     * call the manager to update a post
     * 
     * @return void
     */
    public function updateArticle()
    {
        $adminManager = new AdminManager(DatabaseConnection::getInstance());
        $adminManager->updateArticle($_GET['id'], $_POST['authorID'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['chapo']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['is_visible']));
        header('Location: ' . './index.php?action=blog');
    }


    /**
     * display the page with all the posts visible or not to manage them
     * 
     * @return void
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
     * @return void
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
     * @return void
     */
    public function deleteArticle()
    {
        AdminController::checkAdmin();
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $postManager->deleteArticle($_GET['id']);
        $this->displayAdminArticle();
    }
}
