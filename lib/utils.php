<?php
class Utils
{
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