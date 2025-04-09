<?php

require_once __DIR__ . '/../models/repositories/AdminRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class AdminController
{
    private AdminRepository $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }
    public function login()
    {
        require __DIR__ . '/../views/admin/admin-login.php';
    }

    public function doLogin()
    {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $admin = $this->adminRepository->getAdminByEmail($email);

        if (password_verify($password, $admin->getPassword())) {
            $_SESSION['adminId'] = $admin->getId();
            header('Location: ?action=home');
            exit;
        } else {
            header('Location: ?action=error');
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['adminId']);
        header('Location: ?');
        exit;
    }
}