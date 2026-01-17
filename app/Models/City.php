<?php
namespace App\Models;
class City
{
    private int $id;

    public function __construct(private $name){}

    //getter
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    //setter
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }
}