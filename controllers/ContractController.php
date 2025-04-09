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
    
    public function show(int $contractId) 
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $contract = $this->contractRepository->getContract($contractId);
        require_once __DIR__ . '/../views/contract/contract-view.php';
    }

    public function showFor(?int $userId = null)
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $contracts = $this->contractRepository->getContracts($userId);
        require_once __DIR__ . '/../views/contract/contract-list.php';
    }

    public function create()
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        require_once __DIR__ . "/../views/contract/contract-create.php";
    }

    public function saveCreate()
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        if(isset($_POST['userId']) && is_numeric($_POST['userId'])){
            $contract = new Contract(
                $_POST['userId'], 
                null, 
                $_POST['type'], 
                floatval($_POST['cost']), 
                intval($_POST['duration'])
            );
            $this->contractRepository->saveCreate($contract);
        } else {
            header('Location: ?action=404');
            return;
        }

        header('Location: ?action=contract-showFor');
    }

    public function edit(int $contractId)
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $contract = $this->contractRepository->getContract($contractId);
        require_once __DIR__ . '/../views/contract/contract-edit.php';
    }

    public function saveEdit()
    {   
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $contract = new Contract(
            userId: $_POST['userId'], 
            id: $_POST['id'], 
            type: $_POST['type'], 
            cost: floatval($_POST['cost']), 
            duration: intval($_POST['duration'])
        );
        $this->contractRepository->update($contract);

        header('Location: ?action=contract-showFor');
    }

    public function delete(int $contractId)
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $this->contractRepository->delete($contractId);

        header('Location: ?action=contract-showFor');
    }
}
