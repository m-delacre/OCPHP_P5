<?php

class CommentManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getListVisibleComment(int $idArticle): array
    {
        $comments = [];
        $query = "SELECT * FROM comment WHERE comment.id_article = ? AND comment.is_visible = 'visible';";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$idArticle]);
        while (($row = $statement->fetch())) {
            $comment = new Comment(
                $row['id'],
                $row['id_user'],
                $row['id_article'],
                $row['comment'],
                $row['date'],
                $row['is_visible'],
            );
            $comments[] = $comment;
        }
        return $comments;
    }
}