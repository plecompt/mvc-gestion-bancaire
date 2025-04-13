<?php

require_once __DIR__ . '/../../lib/database.php';
require_once __DIR__ . '/UserRepository.php';
require_once __DIR__ . '/AccountRepository.php';
require_once __DIR__ . '/ContractRepository.php';

class HomeRepository
{
    public DatabaseConnection $connection;
    public UserRepository $userRepository;
    public AccountRepository $accountRepository;
    public ContractRepository $contractRepository;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
        $this->userRepository = new UserRepository();
        $this->accountRepository = new AccountRepository();
        $this->contractRepository = new ContractRepository();
    }

    public function getTotals(): ?array
    {
        return ["userCount" => $this->userRepository->getUserCount(),
        "accountCount" => $this->accountRepository->getAccountCount(),
        "contractCount" => $this->contractRepository->getContractCount()];
    }
}
