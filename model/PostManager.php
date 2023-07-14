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
            $post = new Post(
                $row['id'],
                $row['id_user'],
                $row['date'],
                $row['title'],
                $row['chapo'],
                $row['content'],
                $row['banner'],
                $row['is_visible']
            );
            $posts[] = $post;
        }
        return $posts;
    }
}
