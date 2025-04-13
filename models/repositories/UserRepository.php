<?php

require_once __DIR__ . '/../User.php';
require_once __DIR__ . '/../../lib/database.php';

class UserRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getUser(int $userId): ?User
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM `User` WHERE user_id = :userId");
        $statement->execute(['userId' => $userId]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        return new User($result['user_id'],$result['user_firstName'],$result['user_lastName'],$result['user_email'],$result['user_phone'],$result['user_address']);
    }

    public function getUsers(): ?array
    {

        $statement = $this->connection->getConnection()->query('SELECT * FROM `User`');
        $result = $statement->fetchAll();
        $users = [];

        foreach ($result as $row) {
            $user = new User(
                $row['user_id'],
                $row['user_firstName'],
                $row['user_lastName'],
                $row['user_email'],
                $row['user_phone'],
                $row['user_address']
            );
            $users[] = $user;
        }

        return $users;
    }

    public function getUserCount(): int
    {
        $statement = $this->connection->getConnection()->query('SELECT COUNT(*) as count FROM `User`');
        $result = $statement->fetch();
        
        return (int) $result['count'];
    }

    public function saveCreate(User $user): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('INSERT INTO `User` (user_firstName, user_lastName, user_email, user_phone, user_address) VALUES (:firstName, :lastName, :email, :phone, :address);');

        return $statement->execute([
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'address' => $user->getAddress()
        ]);
    }

    public function update(User $user): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('UPDATE User SET user_firstName = :firstName, user_lastName = :lastName, user_email = :email, user_phone = :phone, user_address = :address WHERE user_id = :id');

        return $statement->execute([
            'id' => $user->getId(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'address' => $user->getAddress()
        ]);
    }

    public function delete(int $userId): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('DELETE FROM `User` WHERE user_id = :userID');
        $statement->bindParam(':userID', $userId);

        return $statement->execute();
    }
}
