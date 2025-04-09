<?php

require_once __DIR__ . '/../models/repositories/AccountRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class AccountController
{
    private AccountRepository $accountRepository;

    public function __construct()
    {
        $this->accountRepository = new AccountRepository();
    }
    public function show(int $accountId) 
    {
        Utils::checkAdmin("Location: ?action=404");
            
        $account = $this->accountRepository->getAccount($accountId);
        require_once __DIR__ . '/../views/account/account-view.php';
    }

    public function showFor(?int $userId = null)
    {
        Utils::checkAdmin("Location: ?action=404");

        $accounts = $this->accountRepository->getAccounts($userId);
        require_once __DIR__ . '/../views/account/account-list.php';
    }

    public function create()
    {
        Utils::checkAdmin("Location: ?action=404");

        //need to be redone
        $userRepo = new UserRepository();
        $users = $userRepo->getUsers();

        require_once __DIR__ . "/../views/account/account-create.php";
    }

    public function saveCreate()
    {
        Utils::checkAdmin("Location: ?action=404");

        if(isset($_SESSION['userId']) && is_numeric($_SESSION['userId'])){
            $account = new Account(
                $_SESSION['userId'],
                0, 
                $_POST['iban'],
                intval($_POST['balance']),
                $_POST['type']
            );
            $this->accountRepository->saveCreate($account);
        } else {
            header('Location: ?action=404');
            return ;
        }

        header('Location: ?action=account-showFor');
    }

    public function edit(int $accountId)
    {
        Utils::checkAdmin("Location: ?action=404");

        $account = $this->accountRepository->getAccount($accountId);
        require_once __DIR__ . '/../views/account/account-edit.php';
    }

    public function saveEdit()
    {   
        Utils::checkAdmin("Location: ?action=404");

        $account = new Account(userId: $_POST['clientId'], id: $_POST['id'], iban: $_POST['iban'], balance: $_POST['balance'], accountType: $_POST['type']);
        $this->accountRepository->saveEdit($account);

        header('Location: ?action=account-showFor');
    }

    public function delete(int $accountId)
    {
        Utils::checkAdmin("Location: ?action=404");
        
        $this->accountRepository->delete($accountId);

        header('Location: ?action=account-showFor');
    }
}