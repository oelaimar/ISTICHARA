<?php
namespace App\Models;

use App\Enums\Specialization;
use App\Models\Person;
use App\Models\City;

class Lawyer extends Person
{
    public function __construct(
        string $name,
        string $email,
        string $phone,
        City $city,
        int $cityId,
        private int $experienceYears,
        private float $hourlyRate,
        private Specialization $specialization,
        private bool $consultation,
    )
    {
        parent::__construct($name, $email, $phone, $city, $cityId);
    }
    //getter
    public function getExperienceYears(): int
    {
        return $this->experienceYears;
    }
    public function getHourlyRate(): float
    {
        return $this->hourlyRate;
    }
    public function getSpecialization(): Specialization
    {
        return $this->specialization;
    }
    public function getConsultation(): bool
    {
        return $this->consultation;
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
    public function setSpecialization(Specialization $specialization): void
    {
        $this->specialization = $specialization;
    }
    public function setConsultation(bool $consultation): void
    {
        $this->consultation = $consultation;
    }


}