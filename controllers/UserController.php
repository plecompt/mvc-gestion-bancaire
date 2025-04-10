<?php

require_once __DIR__ . '/../models/repositories/UserRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class UserController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
    
    public function show($userId) 
    {
        Utils::checkAdmin("Location: ?action=404");

        if (isset($userId) && is_numeric($userId))
            $user = $this->userRepository->getUser($userId);
        if (isset($user)) {
            require_once __DIR__ . '/../views/user/user-view.php';
        } else {
            Utils::errorHandler('errorMessage', 'Erreur: ID user incorrect', 'Location: ?action=error');
        }
    }

    public function showAll()
    {
        Utils::checkAdmin("Location: ?action=404");

        $users = $this->userRepository->getUsers();
        require_once __DIR__ . '/../views/user/user-list.php';
    }

    public function create()
    {
        Utils::checkAdmin("Location: ?action=404");

        require_once __DIR__ . "/../views/user/user-create.php";
    }

    public function saveCreate()
    {
        Utils::checkAdmin("Location: ?action=404");

        if (Utils::checkValidFirstName($_POST['firstName']) && Utils::checkValidLastName($_POST['lastName']) && 
        Utils::checkValidEmail($_POST['email']) && Utils::checkValidAddress($_POST['address'])){
            $user = new User(
                0,
                $_POST['firstName'], 
                $_POST['lastName'], 
                $_POST['email'], 
                $_POST['phone'], 
                $_POST['address']
            );
            $this->userRepository->saveCreate($user);
            header('Location: ?action=user-showAll');
        } else {
            Utils::errorHandler('errorMessage', 'Erreur: données utilisateur invalides', 'Location: ?action=error');
        }
    }

    public function edit(int $userId)
    {
        Utils::checkAdmin("Location: ?action=404");

        if (isset($userId) && is_numeric($userId))
            $user = $this->userRepository->getUser($userId);
        if (isset($user)) {
            require_once __DIR__ . '/../views/user/user-edit.php';
        } else {
            $_SESSION['errorMessage'] = "Erreur: ID utilisateur incorrecte";
            header('Location: ?action=error');
        }
    }

    public function saveEdit()
    {   
        Utils::checkAdmin("Location: ?action=404");

        if (Utils::checkValidFirstName($_POST['firstName']) && Utils::checkValidLastName($_POST['lastName']) && 
        Utils::checkValidEmail($_POST['email']) && Utils::checkValidPhone($_POST['phone']) && Utils::checkValidAddress($_POST['address'])){
            $user = new User(
                id: $_SESSION['userId'],
                firstName: $_POST['firstName'], 
                lastName: $_POST['lastName'], 
                email: $_POST['email'], 
                phone: $_POST['phone'], 
                address: $_POST['address']
            );
            $this->userRepository->update($user);
            header('Location: ?action=user-showAll');
        }  else {
            Utils::errorHandler('errorMessage', 'Erreur: données utilisateur invalides', 'Location: ?action=error');
        }
    }

    public function delete(int $userId)
    {
        Utils::checkAdmin("Location: ?action=404");

        $this->userRepository->delete($userId);

        header('Location: ?action=user-showAll');
    }
}
