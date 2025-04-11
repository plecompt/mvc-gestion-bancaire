<?php

require_once __DIR__ . '/../models/repositories/AccountRepository.php';
require_once __DIR__ . '/../models/repositories/UserRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class AccountController
{
    private AccountRepository $accountRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->accountRepository = new AccountRepository();
        $this->userRepository = new UserRepository();
    }
    public function show($accountId)
    {
        Utils::checkAdmin("Location: ?action=404");

        if (isset($accountId) && is_numeric($accountId))
            $account = $this->accountRepository->getAccount($accountId);
            $user = $this->userRepository->getUser($account->getUserId());
        if (isset($account)) {
            require_once __DIR__ . '/../views/account/account-view.php';
        } else {
            Utils::errorHandler('errorMessage', 'Erreur: ID compte incorrect', 'Location: ?action=error');
        }
    }

    public function showFor($userId = null)
    {
        Utils::checkAdmin("Location: ?action=404");

        if (isset($userId) && is_numeric($userId)) {
            $accounts = $this->accountRepository->getAccounts($userId);
        } else {
            $accounts = $this->accountRepository->getAccounts(null);
            $users = $this->userRepository->getUsers();
        }
        require_once __DIR__ . '/../views/account/account-list.php';
    }

    public function create()
    {
        Utils::checkAdmin("Location: ?action=404");
        
        $users = $this->userRepository->getUsers();

        require_once __DIR__ . "/../views/account/account-create.php";
    }

    public function saveCreate()
    {
        Utils::checkAdmin("Location: ?action=404");

        if (isset($_SESSION['userId']) && is_numeric($_SESSION['userId']) && 
        Utils::checkValidIban($_POST['iban']) && Utils::checkValidAddress($_POST['balance'])) {
            $account = new Account(
                $_SESSION['userId'],
                0,
                $_POST['iban'],
                intval($_POST['balance']),
                $_POST['type']
            );
            $this->accountRepository->saveCreate($account);
            header('Location: ?action=account-showFor');
        } else {
            Utils::errorHandler('errorMessage', 'Erreur: données de compte invalides', 'Location: ?action=error');
        }
    }

    public function edit(int $accountId)
    {
        Utils::checkAdmin("Location: ?action=404");

        if (isset($accountId) && is_numeric($accountId)){
            $account = $this->accountRepository->getAccount($accountId);
            $user = $this->userRepository->getUser($account->getUserId());
        }
        if (isset($account)) {
            require_once __DIR__ . '/../views/account/account-edit.php';
        } else {
            Utils::errorHandler('errorMessage', 'Erreur: ID compte incorrect', 'Location: ?action=error');
        }
    }

    public function saveEdit()
    {
        Utils::checkAdmin("Location: ?action=404");

        if (isset($_SESSION['userId']) && is_numeric($_SESSION['userId']) && 
        Utils::checkValidIban($_POST['iban']) && Utils::checkValidAddress($_POST['balance'])){
            $account = new Account(
                $_SESSION['userId'],
                $_SESSION['accountId'],
                $_POST['iban'],
                $_POST['balance'],
                $_POST['type']
            );
            $this->accountRepository->saveEdit($account);
            header('Location: ?action=account-showFor');
        } else {
            Utils::errorHandler('errorMessage', 'Erreur: données de compte invalides', 'Location: ?action=error');
        }
    }

    public function delete(int $accountId)
    {
        Utils::checkAdmin("Location: ?action=404");

        $this->accountRepository->delete($accountId);

        header('Location: ?action=account-showFor');
    }
}