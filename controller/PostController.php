<?php

class PostController
{
    /**
     * display the bog page with all the visible post 
     * 
     */
    public function displayListPost()
    {
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $posts = $postManager->getAllVisiblePosts();
        $view = new View();
        $view->render('./view/blogpage.php', ['posts' => $posts]);
    }

    /**
     * display a bog post page
     * 
     */
    public function displayPost()
    {
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $post = $postManager->getVisiblePost($_GET['id']);
        $commentManager = new CommentManager(DatabaseConnection::getInstance());
        $comments = $commentManager->getListVisibleComment($_GET['id']);
        $view = new View();
        $view->render('./view/blogpost.php', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * call the manager to create a new comment
     * 
     */
    public function addComment()
    {
        if (isset($_POST['comment'], $_GET['id']) && !empty($_POST['comment']) && is_numeric($_GET['id'])) {
            $commentManager = new CommentManager(DatabaseConnection::getInstance());
            $commentManager->postComment($_SESSION['user_id'], $_GET['id'], htmlspecialchars($_POST['comment']));
            $this->displayPost();
        } else {
            $this->displayPost();
        }
    }
}
