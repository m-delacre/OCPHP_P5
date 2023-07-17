<?php

class PostController
{
    public function displayListPost()
    {
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $posts = $postManager->getAllVisiblePosts();
        $view = new View();
        $view->render('./view/blogpage.php', ['posts' => $posts]);
    }

    public function displayPost()
    {
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $post = $postManager->getPost($_GET['id']);
        $commentManager = new CommentManager(DatabaseConnection::getInstance());
        $comments = $commentManager->getListVisibleComment($_GET['id']);
        $view = new View();
        $view->render('./view/blogpost.php', ['post' => $post, 'comments' => $comments]);
    }

    public function addComment()
    {
        if (isset($_POST['comment'], $_GET['id']) && !empty($_POST['comment']) && is_numeric($_GET['id'])) {
            $commentManager = new CommentManager(DatabaseConnection::getInstance());
            $comment = $commentManager->postComment($_SESSION['user_id'], $_GET['id'], $_POST['comment']);
            $this->displayPost();
        } else {
            $this->displayPost();
        }
    }
}
