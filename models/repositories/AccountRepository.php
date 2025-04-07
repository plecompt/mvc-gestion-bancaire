<?php

require_once __DIR__ . '/../Account.php';
require_once __DIR__ . '/../../lib/database.php';

class AccountRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getAccount(int $accountId): ?Account
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM `Account` WHERE account_id=:accountId");
        $statement->execute(['accountId' => $accountId]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $account = new Account($result['user_id'], $result['account_id'], $result['account_iban'], $result['account_balance'], $result['account_type']);

        return $account;
    }

    public function getAccounts(?int $userId = null): ?array
    {
        echo  "HERE|" . $userId . "|";
        if ($userId !== null) {
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `Account` WHERE user_id = :userId');
            $statement->execute([':userId' => $userId]);
        } else {
            $statement = $this->connection->getConnection()->query('SELECT * FROM `Account`');
        }

        $result = $statement->fetchAll();
        $accounts = [];
        foreach ($result as $row) {
            $account = new Account($row['user_id'], $row['account_id'], $row['account_iban'], $row['account_balance'], $row['account_type']);
            $accounts[] = $account;
        }

        return $accounts;
    }

    public function saveCreate(Account $account): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('INSERT INTO `Account` (account_iban, account_type, account_balance, user_id) VALUES (:iban, :type, :balance, :userId);');

        return $statement->execute([
            'iban' => $account->getIban(),
            'type' => $account->getAccountType(),
            'balance' => $account->getBalance(),
            'userId' => $account->getUserId()
        ]);
    }

    public function update(Account $account): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('UPDATE Account SET account_iban = :account_iban, account_type = :account_type, account_balance = :account_balance WHERE account_id = :account_id');

        return $statement->execute([
            'account_id' => $account->getId(),
            'account_iban' => $account->getIban(),
            'account_type' => $account->getAccountType(),
            'account_balance' => $account->getBalance()
        ]);
    }

    public function delete(int $accountId): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('DELETE FROM `Account` WHERE account_id = :account_id');
        $statement->bindParam(':account_id', $accountId);

        return $statement->execute();
    }
}