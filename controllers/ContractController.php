<?php

require_once __DIR__ . '/../models/repositories/ContractRepository.php';
require_once __DIR__ . '/../models/repositories/UserRepository.php';
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
        Utils::checkAdmin("Location: ?action=404");

        $contract = $this->contractRepository->getContract($contractId);
        require_once __DIR__ . '/../views/contract/contract-view.php';
    }

    public function showFor(?int $userId = null)
    {
        Utils::checkAdmin("Location: ?action=404");

        $contracts = $this->contractRepository->getContracts($userId);
        require_once __DIR__ . '/../views/contract/contract-list.php';
    }

    public function create()
    {
        Utils::checkAdmin("Location: ?action=404");

        //it's dirty...
        $userRepo = new UserRepository();
        $users = $userRepo->getUsers();

        require_once __DIR__ . "/../views/contract/contract-create.php";
    }

    public function saveCreate()
    {
        Utils::checkAdmin("Location: ?action=404");

        if(isset($_SESSION['userId']) && is_numeric($_SESSION['userId'])){
            $contract = new Contract(
                $_SESSION['userId'], 
                0,
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
        Utils::checkAdmin("Location: ?action=404");

        $contract = $this->contractRepository->getContract($contractId);
        require_once __DIR__ . '/../views/contract/contract-edit.php';
    }

    public function saveEdit()
    {   
        Utils::checkAdmin("Location: ?action=404");

        $contract = new Contract(
            $_SESSION['userId'], 
            $_SESSION['contractId'], 
            $_POST['type'], 
            floatval($_POST['cost']), 
            intval($_POST['duration'])
        );
        $this->contractRepository->update($contract);

        header('Location: ?action=contract-showFor');
    }

    public function delete(int $contractId)
    {
        Utils::checkAdmin("Location: ?action=404");

        $this->contractRepository->delete($contractId);

        header('Location: ?action=contract-showFor');
    }
}
