<?php
require_once __DIR__ . '/controllers/AccountController.php';
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/ContractController.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/UserController.php';

session_start();

$accountController = new AccountController();
$adminController = new AdminController();
$contractController = new ContractController();
$homeController = new HomeController();
$userController = new UserController();


$action = $_GET['action'] ?? 'home'; //home by default.
$accountId = $_GET['accountId'] ?? null;
$contractId = $_GET['contractId'] ?? null;
$userId = $_GET['userId'] ?? null;
$adminId = $_GET['adminId'] ?? null;

switch ($action) {
    case 'admin-login':
        $adminController->login(); // display the form to log in
        break;
    case 'admin-doLogin':
        $adminController->doLogin(); // do the logIn
        break;
    case 'admin-logout':
        $adminController->logout(); // logOut
        break;
    case 'account-show':
        $accountController->show($accountId); //display the account of given $accountId
        break;
    case 'account-showFor':
        $accountController->showFor($userId); //display a list of all accounts for given $userId, display all if no parameter is given
        break;
    case 'account-create':
        $accountController->create(); //display form to creat an account
        break;
    case 'account-saveCreate':
        $accountController->saveCreate(); //save the current account in database
        break;
    case 'account-edit':
        $accountController->edit($accountId); //edit the given account
        break;
    case 'account-saveEdit':
        $accountController->saveEdit(); //save the current edition of account in database
        break;
    case 'account-delete': //delete the given account
        $accountController->delete($accountId);
        break;
    case 'contract-show':
        $contractController->show($contractId); //display the contract of given $userId
        break;
    case 'contract-showFor':
        $contractController->showFor($userId); //display a list of the contracts for given $userId, or every contracts if no parameter is given
        break;
    case 'contract-create':
        $contractController->create(); //display form to creat an contract
        break;
    case 'contract-saveCreate':
        $contractController->saveCreate(); //save the current contract in database
        break;
    case 'contract-edit':
        $contractController->edit($contractId); //edit the given contract
        break;
    case 'contract-saveEdit':
        $contractController->saveEdit(); //save the current edition of contract in database
        break;
    case 'contract-delete': //delete the given contract
        $contractController->delete($contractId);
        break;
    case 'user-show':
        $userController->show($userId); //display the user of given $userId
        break;
    case 'user-showAll':
        $userController->showAll(); //display a list of all user
        break;
    case 'user-create':
        $userController->create(); //display form to creat an user
        break;
    case 'user-saveCreate':
        $userController->saveCreate(); //save the current user in database
        break;
    case 'user-edit':
        $userController->edit($userId); //edit the given user
        break;
    case 'user-saveEdit':
        $userController->saveEdit(); //save the current edition of user in database
        break;
    case 'user-delete': //delete the given user
        $userController->delete($userId);
        break;
    case 'home':
        $homeController->home(); // when connected, go to home, else go to login
        break;
    default:
        $homeController->error(); //wrong parameter, show 404
        break;
}