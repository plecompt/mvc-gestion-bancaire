<?php
require_once __DIR__ . '/../models/enums/AccountTypeEnum.php';
require_once __DIR__ . '/../models/enums/ContractTypeEnum.php';

class Utils
{
    public static function isConnected()
    {
        if (isset($_SESSION['adminId'])){
            return true;
        }
        return false;
    }

    public static function isAdmin()
    {
        if (!(Utils::isConnected())){
            return false;
        }
        return true;
    }

    public static function checkAdmin(string $redirection)
    {
        if (!(Utils::isConnected())){
            header($redirection);
        }
    }

    public static function errorHandler(string $sessionKey, string $sessionValue, string $redirection){
        $_SESSION[$sessionKey] = $sessionValue;
        header($redirection);
    }

    //Account checks
    public static function checkValidIban($iban): bool
    {
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $iban)){
            return true;
        }
        return false;
    }

    public static function checkValidBalance($balance): bool
    {
        if (isset($balance) && is_numeric($balance)){
            return true;
        }
        return false;
    }

    //Contracts checks
    public static function checkValidCost($cost): bool
    {
        if (isset($cost) && is_numeric($cost) && $cost >= 0){
            return true;
        }
        return false;
    }

    public static function checkValidDuration($duration): bool
    {
        if (isset($duration) && is_numeric($duration) && $duration >= 0){
            return true;
        }
        return false;
    }

    //User checks
    public static function checkValidFirstName($firstName): bool
    {
        if (isset($firstName) && preg_match("/^[a-zA-Z-' ]*$/", $firstName)){
            return true;
        }
        return false;
    }

    public static function checkValidLastName($lastName): bool
    {
        if (isset($lastName) && preg_match("/^[a-zA-Z-' ]*$/", $lastName)){
            return true;
        }
        return false;
    }

    public static function checkValidEmail($email): bool
    {
        if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkValidPhone($phone): bool
    {
        if (preg_match('/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/', $phone)){
            return true;
        }
        return false;
    }

    public static function checkValidAddress($address): bool
    {
        if (preg_match('/[A-Za-z0-9\-\\,.]+/', $address)){
            return true;
        }
        return false;
    }
}
