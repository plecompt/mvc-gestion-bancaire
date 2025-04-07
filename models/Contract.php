<?php
    require_once __DIR__ . '/../lib/ContractType.php';
    require_once __DIR__ . '/../lib/utils.php';

    class Contract
    {
        private int $userId; //fk
        private int $id;
        private ContractType $type;
        private float $cost;
        private int $duration;


        public function __construct(int $userId = null, int $id = null, string $type, float $cost, int $duration){
            $this->setuserId($userId);
            $this->setId($id);
            $this->setContractType($type);
            $this->setCost($cost);
            $this->setDuration($duration);
        }

        public function getuserId(): int
        {
            return $this->userId;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getContractType(): string
        {
            return $this->type->toString();
        }


        public function getCost(): float
        {
            return $this->cost;
        }

        public function getDuration(): int
        {
            return $this->duration;
        }

        public function setUserId(int $userId): void
        {
            $this->userId = $userId;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function setContractType(string $contractType): void
        {
            $this->contractType = Utils::contractToEnum($contractType);
        }

        public function setCost(float $cost): void
        {
            $this->cost = $cost;
        }

        public function setDuration(int $duration): void
        {
            $this->duration = $duration;
        }
    }