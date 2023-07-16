<?php

class UserManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function connexion(string $email): ?User
    {
        $query = "SELECT * FROM user WHERE user.mail = ?;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$email]);
        $result = $statement->fetch();
        if ($result) {
            $user = new User($result);
            return $user;
        }

        return null;
    }

    public function getUserById(int $id)
    {
        $query = "SELECT * FROM user WHERE user.id = ?;";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$id]);
        $result = $statement->fetch();
        if ($result) {
            $user = new User($result);
            return $user;
        } else {
            return null;
        }
    }

    public function registerUser(
        string $email,
        string $password,
        string $lastName,
        string $firstName,
        string $pseudo,
        string $description,
    ) {
        $query = "INSERT INTO `user` (`id`, `mail`, `password`, `last_name`, `first_name`, `pseudo`, `profil_picture`, `description`, `is_admin`) VALUES (NULL, ?, ?, ?, ?, ?, NULL, ?, '0');";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$email,password_hash($password,PASSWORD_BCRYPT),$lastName,$firstName,$pseudo,$description]);
    }
}
