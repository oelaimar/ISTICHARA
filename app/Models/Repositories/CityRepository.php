<?php

namespace App\Models\Repositories;
use App\Controllers\Core\Database;
use App\Models\City;
use PDO;

class CityRepository
{
    private static ?PDO $pdo = null;
    private static function getPdo(): PDO
    {
        if(!self::$pdo){
            self::$pdo = Database::getInstance()->getConn();
        }
        return self::$pdo;
    }
    public static function getCityById(int $id): City
    {
        $sql = "SELECT * FROM city WHERE id = :id;";
        $stmt = self::getPdo()->prepare($sql);
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch();

        return new City($data['name']);
    }
    public static function getAllCity(): array
    {
        $sql = "SELECT * FROM city;";
        $stmt = self::getPdo()->prepare($sql);
        $stmt->execute();
        $cities = [];
        while($row = $stmt->fetch()){
            $cities[] = new City($row['name']);
        }
        return $cities;
    }
    public static function getCityStats(): array
    {
        $sql = "SELECT city.name, COUNT(lawyer.id) + COUNT(bailiff.id) as total
                FROM city
                LEFT JOIN lawyer ON lawyer.city_id = city.id
                LEFT JOIN bailiff ON bailiff.city_id = city.id
                GROUP BY city.name;";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}