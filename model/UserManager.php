<?php

class UserManager
{
    private DatabaseConnection $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    
    /**
     * check if the email exist and match in the database
     * if yes create a User object with all user info
     * 
     * @return Object User || null
     */
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


    /**
     * get a specific user by his id
     * 
     * @return Object user || null
     */
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


    /**
     * create a new user in database
     * 
     * @return void
     */
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
        $statement->execute([$email, password_hash($password, PASSWORD_BCRYPT), $lastName, $firstName, $pseudo, $description]);
    }
}
