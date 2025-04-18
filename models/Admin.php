<?php
    class Admin
    {
        private int $id;
        private string $email;
        private string $password;

        public function __construct(int $id = null, string $email, string $password){
            $this->setId($id);
            $this->setEmail($email);
            $this->setPassword($password);
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function getPassword(): string
        {
            return $this->password;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function setEmail(string $email): void
        {
            $this->email = htmlspecialchars($email);
        }

        public function setPassword(string $password): void
        {
            $this->password = $password;
        }
    }
