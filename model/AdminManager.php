<?php 

class AdminManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function postArticle(int $userID, string $title, string $chapo, string $content)
    {
        $query = "INSERT INTO `article` (`id`, `id_user`, `date`, `title`, `chapo`, `content`, `banner`, `is_visible`) VALUES (NULL, ?, ?, ?, ?, ?, NULL, true);";
        $statement = $this->connection->getConnection()->prepare($query);
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        $statement->execute([$userID, $currentDate, $title, $chapo, $content]);
    }

    public function updateComment(int $commentID, string $visibility)
    {
        $query = "UPDATE `comment` SET `is_visible` = ? WHERE id = ?;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$visibility,$commentID]);
    }
}