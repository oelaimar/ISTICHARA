<?php

use App\Core\Database;
use App\Models\Lawyer;
use App\Models\Repositories\CityRepository;

class LawyerRepository
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConn();
    }
    private function hydrate(array $data): Lawyer
    {
        $city = CityRepository::getCityById($data['city_id']);

        $lawyer  = new Lawyer(
            $data['name'],
            $data['email'],
            $data['phone'],
            $city,
            $data['city_id'],
            $data['years_of_experience'],
            $data['hourly_rate'],
            $data['specialization'],
            (bool)$data['consultation_online']
        );
        $lawyer->setId($data['id']);

        return $lawyer;
    }
    //Create
    public function create(Lawyer $lawyer) : int
    {
        $sql = "INSERT INTO lawyer (name ,email, phone, years_of_experience, hourly_rate, specialization, consultation_online, city_id)
                VALUES (:name, :email, :phone, :years_of_experience, :hourly_rate, :specialization, :consultation_online, :city_id);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(
            [
                ':name' => $lawyer->getName(),
                ':email' => $lawyer->getEmail(),
                ':phone' => $lawyer->getPhone(),
                ':years_of_experience' => $lawyer->getExperienceYears(),
                ':hourly_rate' => $lawyer->getHourlyRate(),
                ':specialization' => $lawyer->getSpecialization(),
                ':consultation_online' => $lawyer->getConsultation(),
                ':city_id' => $lawyer->getCityId()
            ]
        );
        return (int)$this->pdo->lastInsertId();
    }
    //Read
    public function findAll(): array
    {
        $sql = "SELECT * FROM lawyer;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $lawyers = [];
        while($row = $stmt->fetch()){
            $lawyers[] = $this->hydrate($row);
        }
        return $lawyers;
    }
    public function findById(int $id) : ?Lawyer
    {
        $sql = "SELECT * FROM lawyer WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch();

        if(!$data){
            return null;
        }
        return $this->hydrate($data);
    }
    //update
    public function update(Lawyer $lawyer) : bool
    {
        $sql = "UPDATE lawyer SET
                    name = :name,
                    email = :email,
                    phone = :phone,
                    years_of_experience = :years_of_experience,
                    hourly_rate = :hourly_rate,
                    specialization = :specialization,
                    consultation_online = :consultation_online,
                    city_id = :city_id 
                    WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(
            [
                ':id' => $lawyer->getId(),
                ':name' => $lawyer->getName(),
                ':email' => $lawyer->getEmail(),
                ':phone' => $lawyer->getPhone(),
                ':years_of_experience' => $lawyer->getExperienceYears(),
                ':hourly_rate' => $lawyer->getHourlyRate(),
                ':specialization' => $lawyer->getSpecialization(),
                ':consultation_online' => $lawyer->getConsultation(),
                ':city_id' => $lawyer->getCityId()
            ]
        );
        return $stmt->rowCount() > 0;
    }
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM lawyer WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }
}