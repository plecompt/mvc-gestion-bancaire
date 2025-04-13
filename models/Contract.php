<?php
    require_once __DIR__ . '/enums/ContractTypeEnum.php';
    require_once __DIR__ . '/../lib/utils.php';

    class Contract
    {
        private int $userId; //fk
        private int $id;
        private ContractType $contractType;
        private float $cost;
        private int $duration;


        public function __construct(int $userId = null, int $id = null, string|ContractType $contractType, float $cost, int $duration){
            $this->setuserId($userId);
            $this->setId($id);
            $this->setContractType($contractType);
            $this->setCost($cost);
            $this->setDuration($duration);
        }

        public function getUserId(): int
        {
            return $this->userId;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getContractType(): string
        {
            return $this->contractType->toString();
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

        public function setContractType(string|ContractType $contractType): void
        {
            if (is_string($contractType)) {
                $this->contractType = ContractType::toEnum($contractType);
            } else {
                $this->contractType = $contractType;
            }
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
