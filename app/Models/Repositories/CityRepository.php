<?php

namespace App\Models\Repositories;
use App\Core\Database;
use App\Models\City;

class CityRepository
{
    private static PDO $pdo;
    function __construct()
    {
        self::$pdo = Database::getInstance()->getConn();
    }
    public static function getCityById(int $id): City
    {
        $sql = "SELECT * FROM city WHERE id = :id;";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch();

        return new City($data['name']);
    }
    public static function getAllCity(): array
    {
        $sql = "SELECT * FROM city;";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        $cities = [];
        while($row = $stmt->fetch()){
            $cities[] = new City($row['name']);
        }
        return $cities;
    }
}