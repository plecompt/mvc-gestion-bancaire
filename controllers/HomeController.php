<?php

require_once __DIR__ . '/../models/repositories/HomeRepository.php';
require_once __DIR__ . '/../lib/utils.php';

class HomeController
{
    private HomeRepository $homeRepository;

    public function __construct()
    {
        $this->homeRepository = new HomeRepository();
    }
    public function home()
    {
        $totals = $this->homeRepository->getTotals();
        require __DIR__ . '/../views/home/home.php';
    }


    public function error()
    {
        require __DIR__ . '/../views/home/404.php';
    }
}