<?php

require_once __DIR__ . '/../Contract.php';
require_once __DIR__ . '/../../lib/database.php';

class ContractRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getContract(int $contractId): ?Contract
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM `Contract` WHERE contract_id = :contractId");
        $statement->execute(['contractId' => $contractId]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        return new Contract($result['user_id'], $result['contract_id'], $result['contract_type'], $result['contract_cost'], $result['contract_duration']);
    }

    public function getContracts(?int $userId = null): ?array
    {
        if ($userId !== null) {
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `Contract` WHERE user_id = :userId');
            $statement->execute(['userId' => $userId]);
        } else {
            $statement = $this->connection->getConnection()->query('SELECT * FROM `Contract`');
        }

        $result = $statement->fetchAll();
        $contracts = [];
        
        foreach ($result as $row) {
            $contract = new Contract(
                $row['user_id'], 
                $row['contract_id'], 
                $row['contract_type'], 
                $row['contract_cost'], 
                $row['contract_duration']
            );
            $contracts[] = $contract;
        }

        return $contracts;
    }

    public function getContractCount(): int
    {
        $statement = $this->connection->getConnection()->query('SELECT COUNT(*) as count FROM `Contract`');
        $result = $statement->fetch();
        
        return (int) $result['count'];
    }


    public function saveCreate(Contract $contract): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('INSERT INTO `Contract` (contract_type, contract_cost, contract_duration, user_id) VALUES (:type, :cost, :duration, :userId);');

        return $statement->execute([
            'type' => $contract->getContractType(),
            'cost' => $contract->getCost(),
            'duration' => $contract->getDuration(),
            'userId' => $contract->getUserId()
        ]);
    }

    public function update(Contract $contract): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('UPDATE Contract SET contract_type = :contract_type, contract_cost = :contract_cost, contract_duration = :contract_duration WHERE contract_id = :contract_id');

        return $statement->execute([
            'contract_id' => $contract->getId(),
            'contract_type' => $contract->getContractType(),
            'contract_cost' => $contract->getCost(),
            'contract_duration' => $contract->getDuration()
        ]);
    }

    public function delete(int $contractId): bool
    {
        $statement = $this->connection
            ->getConnection()
            ->prepare('DELETE FROM `Contract` WHERE contract_id = :contract_id');
        $statement->bindParam(':contract_id', $contractId);

        return $statement->execute();
    }
}
