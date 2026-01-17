<?php
namespace App\Models;

use App\Enums\Type;
use App\Models\Person;
use App\Models\City;


class Bailiff extends Person
{
    public function __construct(
        string $name,
        string $email,
        City $city,
        int $cityId,
        string $phone,
        private int    $experienceYears,
        private float  $hourlyRate,
        private Type $type,
    )
    {
        parent::__construct($name, $email, $phone, $city, $cityId);
    }

    // getter
    public function getExperienceYears(): int
    {
        return $this->experienceYears;
    }

    public function getHourlyRate(): float
    {
        return $this->hourlyRate;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    //setter
    public function setExperienceYears(int $experienceYears): void
    {
        $this->experienceYears = $experienceYears;
    }

    public function setHourlyRate(float $hourlyRate): void
    {
        $this->hourlyRate = $hourlyRate;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }


}