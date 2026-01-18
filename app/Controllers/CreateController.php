<?php

namespace  App\Controllers;
use App\Controllers\Core\View;
use App\Models\Repositories\BailiffRepository;
use App\Models\Repositories\CityRepository;
use App\Models\Repositories\LawyerRepository;

class CreateController
{
    public function index(): void
    {
        $lawyerRepository = new LawyerRepository();
        $bailiffRepository = new BailiffRepository();
        $data =
            [
                "title" => "Home Page",
                "lawyers" => $lawyerRepository->findAll(),
                "findTopNumberOfLawyers" => $lawyerRepository->findTopNumberOfLawyers(3),
                "bailiffs" => $bailiffRepository->findAll(),
                "cities" => CityRepository::getAllCity(),
                "cityStats" => CityRepository::getCityStats(),
            ];
        View::render('home/create', $data);
    }
}