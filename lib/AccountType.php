<?php
    enum AccountType
    {
        case compteCourant;
        case compteEpargne;

        public function toString(): string
        {
            return match($this) {
                self::compteCourant => "Compte courant",
                self::compteEpargne => "Compte épargne",
            };
        }
    }
?>