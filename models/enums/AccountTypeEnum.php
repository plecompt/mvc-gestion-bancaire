<?php
    enum AccountType : string
    {
        case compteCourant = "Compte courant";
        case compteEpargne = "Compte épargne";

        public function toString(): string
        {
            return $this->value;
        }
        
        public static function toEnum(string $accountType): AccountType
        {
            return self::from($accountType);
        }
    }
?>