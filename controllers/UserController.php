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
    
    public function show(int $userId) 
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $user = $this->userRepository->getUser($userId);
        require_once __DIR__ . '/../views/user/user-view.php';
    }

    public function showAll()
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $users = $this->userRepository->getUsers();
        require_once __DIR__ . '/../views/user/user-list.php';
    }

    public function create()
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        require_once __DIR__ . "/../views/user/user-create.php";
    }

    public function saveCreate()
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $user = new User(
            id: $_POST['id'],
            firstName: $_POST['firstName'], 
            lastName: $_POST['lastName'], 
            email: $_POST['email'], 
            phone: $_POST['phone'], 
            address: $_POST['address']
        );
        $this->userRepository->saveCreate($user);

        header('Location: ?action=user-showAll');
    }

    public function edit(int $userId)
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $user = $this->userRepository->getUser($userId);
        require_once __DIR__ . '/../views/user/user-edit.php';
    }

    public function saveEdit()
    {   
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $user = new User(
            id: $_POST['id'],
            firstName: $_POST['firstName'], 
            lastName: $_POST['lastName'], 
            email: $_POST['email'], 
            phone: $_POST['phone'], 
            address: $_POST['address']
        );
        $this->userRepository->update($user);

        header('Location: ?action=user-showAll');
    }

    public function delete(int $userId)
    {
        if(!Utils::isAdmin()){
            header('Location: ?action=404');
        }

        $this->userRepository->delete($userId);

        header('Location: ?action=user-showAll');
    }
}
