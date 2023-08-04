<?php

class PostManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }


    /**
     * get all the visible blog post from database
     * 
     * @return array of objects
     */
    public function getAllVisiblePosts()
    {
        $posts = [];
        $query = "SELECT * FROM article WHERE article.is_visible = true";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute();
        while (($row = $statement->fetch())) {
            $post = new Post($row);
            $posts[] = $post;
        }
        return $posts;
    }


    /**
     * get all the blog post from database
     * 
     * @return array of objects
     */
    public function getAllPost()
    {
        $posts = [];
        $query = "SELECT * FROM article;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute();
        while (($row = $statement->fetch())) {
            $post = new Post($row);
            $posts[] = $post;
        }
        return $posts;
    }


    /**
     * get a single visible blog post from database
     * 
     * @return object || null
     */
    public function getVisiblePost(int $id)
    {
        $query = "SELECT * FROM article WHERE article.id = ? AND article.is_visible = true;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$id]);
        $result = $statement->fetch();
        if ($result) {
            $post = new Post($result);
            return $post;
        }

        return null;
    }

    
    /**
     * get a single blog post from database
     * 
     * @return object || null
     */
    public function getPost(int $id)
    {
        $query = "SELECT * FROM article WHERE article.id = ?;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$id]);
        $result = $statement->fetch();
        if ($result) {
            $post = new Post($result);
            return $post;
        }

        return null;
    }


    /**
     * delete a specific blog post from database
     * 
     * @return void
     */
    public function deleteArticle(int $id)
    {
        $query = "DELETE FROM `article` WHERE `id` = ?;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$id]);
    }
}
