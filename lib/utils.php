<?php
require_once __DIR__ . '/AccountType.php';
require_once __DIR__ . '/ContractType.php';
class Utils
{
    static function accountToEnum(string $accountType): AccountType
    {
        return match ($accountType) {
            "Compte courant" => AccountType::compteCourant,
            "Compte épargne" => AccountType::compteEpargne,
        };
    }

    static function contractToEnum(string $contractType): ContractType
    {
        return match ($contractType) {
            "Assurance vie" => ContractType::assuranceVie,
            "Assurance habitation" => ContractType::assuranceHabitation,
            "Crédit immobilier" => ContractType::creditImmobilier,
            "Crédit à la consommation" => ContractType::creditConsommation,
            "Compte épargne logement" => ContractType::compteEpargne,
        };
    }

    static function isConnected()
    {
        if (isset($_SESSION['adminId'])) {
            return true;
        }
        return false;
    }

    static function isAdmin()
    {
        if (!(Utils::isConnected())) {
            return false;
        }
        return true;
    }

    static function checkAdmin(string $redirection){
        if (!(Utils::isConnected())) {
            header($redirection);
        }
    }
}
?>