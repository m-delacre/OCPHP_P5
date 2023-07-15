<?php

class PostController
{
    public function displayListPost()
    {
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $posts = $postManager->getAllVisiblePosts();
        $view = new View();
        $view->render('./view/blogpage.php', ['posts'=>$posts]);
    }

    public function displayPost()
    {
        $postManager = new PostManager(DatabaseConnection::getInstance());
        $post = $postManager->getPost($_GET['id']);
        $view = new View();
        $view->render('./view/blogpost.php', ['post'=>$post]);
    }
}