<?php

class PostManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

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
}
