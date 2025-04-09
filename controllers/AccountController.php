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
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }
            
        $account = $this->accountRepository->getAccount($accountId);
        require_once __DIR__ . '/../views/account/account-view.php';
    }

    public function showFor(?int $userId = null)
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $account = $this->accountRepository->getAccounts($userId);
        require_once __DIR__ . '/../views/account/account-list.php';
    }

    public function create()
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        require_once __DIR__ . "/../views/account/account-create.php";
    }

    public function saveCreate()
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        if(isset($_POST['userId']) && is_numeric($_POST['userId'])){
            $account = new Account($_POST['userId'], null, $_POST['iban'], intval($_POST['balance']), $_POST['type']);
            $this->accountRepository->saveCreate($account);
        } else {
            header('Location: ?action=404');
            return ;
        }

        header('Location: ?action=account-showFor');
    }

    public function edit(int $accountId)
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $account = $this->accountRepository->getAccount($accountId);
        require_once __DIR__ . '/../views/account/account-edit.php';
    }

    public function saveEdit()
    {   
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $account = new Account(userId: $_POST['clientId'], id: $_POST['id'], iban: $_POST['iban'], balance: $_POST['balance'], accountType: $_POST['type']);
        $this->accountRepository->saveEdit($account);

        header('Location: ?action=account-showFor');
    }

    public function delete(int $accountId)
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }
        
        $this->accountRepository->delete($accountId);

        header('Location: ?action=account-showFor');
    }
}