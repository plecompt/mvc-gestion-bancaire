<?php

require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/../Admin.php';

class AdminRepository 
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getAdminByEmail(string $adminEmail): ?Admin
    {
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM Admin WHERE admin_email = :adminEmail');
        $statement->execute(['adminEmail' => $adminEmail]);

        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $admin = new Admin();
        $admin->setId($result['id']);
        $admin->setEmail($result['email']);
        $admin->setPassword($result['password']);
        return $admin;
    }
}