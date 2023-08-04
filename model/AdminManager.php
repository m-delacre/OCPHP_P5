<?php

class AdminManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    
    /**
     * create new post in the database
     * 
     * @return void
     */
    public function postArticle(int $userID, string $title, string $chapo, string $content, bool $visible)
    {
        $query = "INSERT INTO `article` (`id`, `id_user`, `date`, `title`, `chapo`, `content`, `banner`, `is_visible`) VALUES (NULL, ?, ?, ?, ?, ?, NULL, ?);";
        $statement = $this->connection->getConnection()->prepare($query);
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        $statement->execute([$userID, $currentDate, $title, $chapo, $content, $visible]);
    }


    /**
     * update the visibility of a single comment
     * 
     * @return void
     */
    public function updateComment(int $commentID, string $visibility)
    {
        $query = "UPDATE `comment` SET `is_visible` = ? WHERE id = ?;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$visibility, $commentID]);
    }


    /**
     * update a single post
     * 
     * @return void
     */
    public function updateArticle(int $articleID, int $userID,string $title, string $chapo, string $content, string $isVisible)
    {
        $query = "UPDATE `article` SET `id_user` = ?, `last_update` = ?, `title` = ?, `chapo` = ?, `content` = ?, `is_visible` = ? WHERE id = ?;";
        $statement = $this->connection->getConnection()->prepare($query);
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        $statement->execute([$userID, $currentDate, $title, $chapo, $content, $isVisible, $articleID]);
    }


    /**
     * get all the admin from the database
     * 
     * @return array of objects
     */
    public function getAllAdmin()
    {
        $users = [];
        $query = "SELECT * FROM `user` WHERE `is_admin`= 1 ;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute();
        while (($row = $statement->fetch())) {
            $user = new User($row);
            $users[] = $user;
        }
        return $users;
    }
}
