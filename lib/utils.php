<?php
    require_once __DIR__ . '/../lib/AccountType.php';
    require_once __DIR__ . '/../lib/ContractType.php';
    class Utils{
        static function accountToEnum(string $accountType): AccountType
        {
            return match($accountType) {
                "Compte courant" => AccountType::compteCourant ,
                "Compte épargne" => AccountType::compteEpargne,
            };
        }

        static function contractToEnum(string $contractType): ContractType
        {
            return match($contractType) {
                "Assurance vie" => ContractType::assuranceVie ,
                "Assurance habitation" => ContractType::assuranceHabitation,
                "Crédit immobilier" => ContractType::creditImmobilier,
                "Crédit à la consommation" => ContractType::creditConsommation,
                "Compte épargne logement" => ContractType::compteEpargne,
            };
        }
    }
?>