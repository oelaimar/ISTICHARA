<?php

namespace  App\Controllers;

use App\Controllers\Core\View;
use App\Models\Bailiff;
use App\Models\City;
use App\Models\Lawyer;
use App\Models\Repositories\BailiffRepository;
use App\Models\Repositories\CityRepository;
use App\Models\Repositories\LawyerRepository;
use App\Enums\Specialization;
use App\Enums\Type;

class CreateController
{
    public function index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->action();
        }
        $lawyerRepository = new LawyerRepository();
        $bailiffRepository = new BailiffRepository();
        $data =
            [
                "title" => "CREATE Page",
                "lawyers" => $lawyerRepository->findAll(),
                "findTopNumberOfLawyers" => $lawyerRepository->findTopNumberOfLawyers(3),
                "bailiffs" => $bailiffRepository->findAll(),
                "cities" => CityRepository::getAllCity(),
                "cityStats" => CityRepository::getCityStats(),
            ];
        View::render('create/index', $data);
    }

    public function action(): bool
    {
        $city = CityRepository::gatCityByName($_POST['city']);
        if($_POST['prof_type'] === 'lawyer'){
            $lawyer = new Lawyer(
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                new City($_POST['city']),
                $city->getId(),
                (int)$_POST['YearsOfExperience'],
                (float)$_POST['hourlyRate'],
                Specialization::from($_POST['specialty']),
                (bool)$_POST['Consultation'],
            );
        return (bool)(new LawyerRepository())->create($lawyer);
        }else if($_POST['prof_type'] === 'bailiff'){
            $bailiff = new Bailiff(
                $_POST['name'],
                $_POST['email'],
                new City($_POST['city']),
                $city->getId(),
                $_POST['phone'],
                (int)$_POST['YearsOfExperience'],
                (float)$_POST['hourlyRate'],
                Type::from($_POST['act_type']),
            );
            return (bool)(new BailiffRepository())->create($bailiff);
        }
        return false;
    }
}