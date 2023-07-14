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
}