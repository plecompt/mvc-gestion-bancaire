<?php

require_once __DIR__ . '/../models/repositories/ContractRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class ContractController
{
    private ContractRepository $contractRepository;

    public function __construct()
    {
        $this->contractRepository = new ContractRepository();
    }
    public function show(int $accountId) 
    {
        $account = $this->contractRepository->getContract($accountId);
        require_once __DIR__ . '/../views/account/contract-view.php';
    }

    public function showFor(?int $userId = null)
    {
        $account = $this->contractRepository->getContracts($userId);
        require_once __DIR__ . '/../views/account/contract-list.php';
    }

    public function create()
    {
        require_once __DIR__ . "/../views/account/contract-create.php";
    }

    public function saveCreate()
    {
        if(isset($_POST['userId']) && is_numeric($_POST['userId'])){
            $account = new Contract($_POST['userId'], null, $_POST['iban'], intval($_POST['balance']), $_POST['type']);
            $this->contractRepository->saveCreate($account);
        } else {
            header('Location: ?action=404');
            return ;
        }

        header('Location: ?action=contract-showFor');
    }

    public function edit(int $accountId)
    {
        $account = $this->contractRepository->getContract($accountId);
        require_once __DIR__ . '/../views/account/contract-edit.php';
    }

    public function saveEdit()
    {   
        $account = new Contract(userId: $_POST['clientId'], id: $_POST['id'], iban: $_POST['iban'], balance: $_POST['balance'], accountType: $_POST['type']);
        $this->contractRepository->update($account);

        header('Location: ?action=contract-showFor');
    }

    public function delete(int $accountId)
    {
        $this->contractRepository->delete($accountId);

        header('Location: ?action=contract-showFor');
    }
}