<?php

namespace App\Models;

use PDO;

class HobbiesModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllHobbies(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `hobbies`;');
        $query->execute();
        return $query->fetchAll();
    }

    public function addHobby(string $name): bool
    {
        $mysql = "INSERT INTO `hobbies` (`name`) VALUES (:name);";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'name' => $name
        ];
        return ($query->execute($bindingParams));
    }

    public function editHobby(int $id, array $newData): bool
    {
//        $hobbyFields = $this->getHobbyFields();
//        if (!in_array(strtolower(trim($newData['field'])), $hobbyFields)) {
//            return false;
//        }
        $mysql = "UPDATE `hobbies` SET `name` = :name WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id,
            'name' => $newData['name']
        ];
        return ($query->execute($bindingParams));
    }

    public function getHobbyFields(): array
    {
        $mysql = "SELECT column_name as `Field` FROM information_schema.columns WHERE table_name='hobbies' AND NOT column_name = 'id';";
        $query = $this->db->prepare($mysql);
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteHobby(int $id): bool
    {
        $mysql = "UPDATE `hobbies` SET `deleted` = '1' WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id
        ];
        return ($query->execute($bindingParams));
    }
}