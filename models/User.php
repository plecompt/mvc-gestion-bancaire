<?php
    class User
    {
        private int $id;
        private string $firstName;
        private string $lastName;
        private string $email;
        private string $phone;
        private ?string $address;

        public function __construct(int $id, string $firstName, string $lastName, string $email, string $phone, ?string $address = null){
            $this->setId($id);
            $this->setFirstName($firstName);
            $this->setLastName($lastName);
            $this->setEmail($email);
            $this->setPhone($phone);
            $this->setAddress($address);
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getFirstName(): string
        {
            return $this->firstName;
        }

        public function getLastName(): string
        {
            return $this->lastName;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getPhone(): string
        {
            return $this->phone;
        }

        public function getAddress(): string
        {
            return $this->address;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function setFirstName(string $firstName): void
        {
            $this->firstName = $firstName;
        }

        public function setLastName(string $lastName): void
        {
            $this->lastName = $lastName;
        }

        public function setEmail(string $email): void
        {
            $this->email = htmlspecialchars($email);
        }

        public function setPhone(string $phone): void
        {
            $this->phone = htmlspecialchars($phone);
        }

        public function setAddress(string $address): void
        {
            $this->address = htmlspecialchars($address);
        }
    }
