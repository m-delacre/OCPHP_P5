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

    public function getPost(int $id)
    {
        $query = "SELECT * FROM article WHERE article.id = ? AND article.is_visible = true;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$id]);
        $result = $statement->fetch();
        if ($result) {
            $post = new Post(
                $result['id'],
                $result['id_user'],
                $result['date'],
                $result['title'],
                $result['chapo'],
                $result['content'],
                $result['banner'],
                $result['is_visible'],
            );
            return $post;
        }

        return null;
    }
}
