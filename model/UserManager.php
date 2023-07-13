<?php

class UserManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getUser(string $email, string $password): ?User
    {
        $query = "SELECT * FROM user WHERE user.mail = ? AND user.password = ?;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$email, $password]);
        $result = $statement->fetch();
        if($result)
        {
            $user = new User($result);
            return $user;
        }
        
        return null;
    }
}