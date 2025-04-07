<?php
    enum ContractType
    {
        case assuranceVie;
        case assuranceHabitation;
        case creditImmobilier;
        case creditConsommation;
        case compteEpargne;

        public function toString(): string
        {
            return match($this) {
                self::assuranceVie => "Assurance vie",
                self::assuranceHabitation => "Assurance habitation",
                self::creditImmobilier => "Crédit immobilier",
                self::creditConsommation => "Crédit à la consommation",
                self::compteEpargne => "Compte épargne logement",
            };
        }
    }
?>