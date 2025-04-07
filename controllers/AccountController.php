<?php

require_once __DIR__ . '/../models/repositories/AccountRepository.php';
require_once __DIR__ . '/../utils/utils.php';

class AccountController
{
    private AccountRepository $accountRepository;

    public function __construct()
    {
        $this->accountRepository = new AccountRepository();
    }
    public function show(int $accountId) 
    {
        $account = $this->accountRepository->getAccount($accountId);
        require_once __DIR__ . '/../views/account/account-view.php';
    }

    public function showFor(?int $userId = null)
    {
        $account = $this->accountRepository->getAccounts($userId);
        require_once __DIR__ . '/../views/account/account-list.php';
    }

    public function create()
    {
        require_once __DIR__ . "/../views/account/account-create.php";
    }

    public function saveCreate()
    {
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
        $account = $this->accountRepository->getAccount($accountId);
        require_once __DIR__ . '/../views/account/account-edit.php';
    }

    public function saveEdit()
    {   
        $account = new Account(userId: $_POST['clientId'], id: $_POST['id'], iban: $_POST['iban'], balance: $_POST['balance'], accountType: $_POST['type']);
        $this->accountRepository->update($account);

        header('Location: ?action=account-showFor');
    }

    public function delete(int $accountId)
    {
        $this->accountRepository->delete($accountId);

        header('Location: ?action=account-showFor');
    }
}