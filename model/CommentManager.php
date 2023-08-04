<?php

class CommentManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * get all the visible comment from the database of a specific post
     * 
     * @return array of objects
     */
    public function getListVisibleComment(int $idArticle): array
    {
        $comments = [];
        $query = "SELECT * FROM comment WHERE comment.id_article = ? AND comment.is_visible = 'visible';";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$idArticle]);
        while (($row = $statement->fetch())) {
            $comment = new Comment($row);
            $comments[] = $comment;
        }
        return $comments;
    }

    /**
     * get all the comment from the database with the statue 'pending'
     * 
     * @return array of objects
     */
    public function getListPendingComment(): array
    {
        $comments = [];
        $query = "SELECT * FROM comment WHERE comment.is_visible = 'pending';";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute();
        while (($row = $statement->fetch())) {
            $comment = new Comment($row);
            $comments[] = $comment;
        }
        return $comments;
    }

    /**
     * create a new comment on a specific post
     * 
     * @return array of objects
     */
    public function postComment(int $userID, int $articleID, string $comment)
    {
        $query = "INSERT INTO `comment` (`id`, `id_user`, `id_article`, `comment`, `date`, `is_visible`) VALUES (NULL, ?, ?, ?, ?, 'pending');";
        $statement = $this->connection->getConnection()->prepare($query);
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        $statement->execute([$userID, $articleID, $comment, $currentDate]);
    }
}
