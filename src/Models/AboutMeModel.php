<?php

namespace App\Models;

use PDO;

class AboutMeModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllAboutMe(): array
    {
        $query = $this->db->prepare('SELECT `name`, `description` FROM `about_me` WHERE `deleted` = 0;');
        $query->execute();
        return $query->fetchAll();
    }

    public function getOneAboutMe(string $name): array
    {
        $mysql = 'SELECT `name`, `description` FROM `about_me` WHERE `name` = :name;';
        $query = $this->db->prepare($mysql);
        $query->execute(['name' => $name]);
        return $query->fetch();
    }

    public function getAboutMeFields(): array
    {
        $mysql = 'SELECT `name` FROM `about_me`';
        $query = $this->db->prepare($mysql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addAboutMe(string $name, string $description): bool
    {
        $query = $this->db->prepare("INSERT INTO `about_me` (`name`, `description`) VALUES (:name, :description)");
        return ($query->execute(['name' => $name, 'description' => $description]));
    }

    public function editAboutMe(int $id, array $newData)
    {
        $aboutMeFields = $this->getAboutMeFields();
//        if (!in_array(strtolower(trim($newData['field'])), $aboutMeFields)) {
//            return false;
//        }
        $mysql = "UPDATE `about_me` SET `" . $newData['field'] . "` = :newValue WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'newValue' => $newData['newValue'],
            'id' => $id
        ];
        return ($query->execute($bindingParams));
    }

    public function deleteAboutMe(int $id): bool
    {
        $mysql = "UPDATE `about_me` SET `deleted` = '1' WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id
        ];
        return ($query->execute($bindingParams));
    }
}