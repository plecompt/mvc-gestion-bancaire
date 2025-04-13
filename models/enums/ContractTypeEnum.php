<?php
    enum ContractType : string
    {
        case assuranceVie = "Assurance vie";
        case assuranceHabitation = "Assurance habitation";
        case creditImmobilier = "Crédit immobilier";
        case creditConsommation = "Crédit à la consommation";
        case compteEpargne = "Compte épargne logement";

        public function toString(): string
        {
            return $this->value;
        }
        
        public static function toEnum(string $contractType): ContractType
        {
            return self::from($contractType);
        }
    }
