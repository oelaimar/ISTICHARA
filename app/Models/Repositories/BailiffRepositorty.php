<?php

use App\Core\Database;
use App\Models\Bailiff;
use App\Models\Repositories\CityRepository;

class BailiffRepositorty
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConn();
    }
    private function hydrate(array $data): Bailiff
    {
        $city = CityRepository::getCityById($data['city_id']);
        $bailiff  = new Bailiff(
            $data['name'],
            $data['email'],
            $city,
            $data['city_id'],
            $data['phone'],
            $data['years_of_experience'],
            $data['hourly_rate'],
            $data['type']
        );
        $bailiff->setId($data['id']);

        return $bailiff;
    }
    //Create
    public function create(Bailiff $bailiff) : int
    {
        $sql = "INSERT INTO bailiff (name ,email, phone, years_of_experience, hourly_rate, type, city_id)
                VALUES (:name, :email, :phone, :years_of_experience, :hourly_rate, :type, :city_id);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(
            [
                ':name' => $bailiff->getName(),
                ':email' => $bailiff->getEmail(),
                ':phone' => $bailiff->getPhone(),
                ':years_of_experience' => $bailiff->getExperienceYears(),
                ':hourly_rate' => $bailiff->getHourlyRate(),
                ':type' => $bailiff->getType(),
                ':city_id' => $bailiff->getCityId()
            ]
        );
        return (int)$this->pdo->lastInsertId();
    }
    //Read
    public function findAll(): array
    {
        $sql = "SELECT * FROM bailiff;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $layers = [];
        while($row = $stmt->fetch()){
            $layers[] = $this->hydrate($row);
        }
        return $layers;
    }
    public function findById(int $id) : ?Bailiff
    {
        $sql = "SELECT * FROM bailiff WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch();

        if(!$data){
            return null;
        }
        return $this->hydrate($data);
    }
    //update
    public function update(Bailiff $bailiff) : bool
    {
        $sql = "UPDATE bailiff SET
                    name = :name,
                    email = :email,
                    phone = :phone,
                    years_of_experience = :years_of_experience,
                    hourly_rate = :hourly_rate,
                    type = :type,
                    city_id = :city_id 
                    WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(
            [
                ':id' => $bailiff->getId(),
                ':name' => $bailiff->getName(),
                ':email' => $bailiff->getEmail(),
                ':phone' => $bailiff->getPhone(),
                ':years_of_experience' => $bailiff->getExperienceYears(),
                ':hourly_rate' => $bailiff->getHourlyRate(),
                ':type' => $bailiff->getType(),
                ':city_id' => $bailiff->getCityId()
            ]
        );
        return $stmt->rowCount() > 0;
    }
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM bailiff WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }
}