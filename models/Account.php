<?php
    require_once __DIR__ . '/enums/AccountTypeEnum.php';
    require_once __DIR__ . '/../lib/utils.php';

    class Account
    {
        private int $userId; //fk
        private int $id;
        private string $iban;
        private float $balance;
        private AccountType $accountType;

        public function __construct(int $userId = null, int $id = null, string $iban, int $balance, string|AccountType $accountType){
            $this->setUserId($userId);
            $this->setId($id);
            $this->setIban($iban);
            $this->setBalance($balance);
            $this->setAccountType($accountType);
        }

        public function getUserId(): int
        {
            return $this->userId;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getIban(): string
        {
            return $this->iban;
        }

        public function getBalance(): string
        {
            return $this->balance;
        }

        public function getAccountType(): string
        {
            return $this->accountType->toString();
        }

        public function setUserId(int $userId): void
        {
            $this->userId = $userId;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function setIban(string $iban): void
        {
            $this->iban = htmlspecialchars($iban);
        }

        public function setBalance(float $balance): void
        {
            $this->balance = $balance;
        }

        public function setAccountType(string|AccountType $accountType): void
        {
            if (is_string($accountType)) {
                $this->accountType = AccountType::toEnum($accountType);
            } else {
                $this->accountType = $accountType;
            }
        }
    }
