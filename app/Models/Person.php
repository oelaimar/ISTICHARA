<?php
namespace App\Models;
class Person
{
    protected int $id;
    public function __construct(
        protected string $name,
        protected string $email,
        protected string $phone,
        protected City $city,
        protected int $cityId
    ){}

    // getter
    public function getId(): int
    {
        return $this->id;
    }
    public function getName() : string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getCity(): City
    {
        return $this->city;
    }
    public function getCityId(): int
    {
        return $this->cityId;
    }
    //setter
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setName(string $name) :void
    {
        $this->name = $name;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    public function setCity(City $city): void
    {
        $this->city = $city;
    }
    public function setCityId(int $id): void
    {
        $this->cityId = $id;
    }
}