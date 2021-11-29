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
        $query = $this->db->prepare('SELECT `about_me`, `io_academy` FROM `about_me`;');
        $query->execute();
        return $query->fetchAll();
    }

    public function getOneAboutMe($field): array
    {
        $mysql = 'SELECT ' . $field . ' FROM `about_me`;';
        $query = $this->db->prepare($mysql);
        $query->execute();
        return $query->fetch();
    }

    public function getAboutMeFields(): array
    {
        $mysql = "SELECT column_name as `Field` FROM information_schema.columns WHERE table_name='about_me' AND NOT column_name = 'id';";
        $query = $this->db->prepare($mysql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addAboutMe(string $field, string $newValue): bool
    {
        $query = $this->db->prepare("ALTER TABLE `about_me` ADD :field varchar(1000);");
        $attemptOne = ($query->execute(['field' => $field]));
        $query = $this->db->prepare("INSERT INTO `about_me` (:field) VALUES (:newValue)");
        $attemptTwo = ($query->execute(['field' => $field, 'newValue' => $newValue]));
        return ($attemptOne && $attemptTwo);
    }

    public function editAboutMe(array $newData)
    {
//        $aboutMeFields = $this->getAboutMeFields();
//        if (!in_array(strtolower(trim($newData['field'])), $aboutMeFields)) {
//            return false;
//        }
        $mysql = "UPDATE `about_me` SET `" . $newData['field'] . "` = :newValue WHERE `id` = 1;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'newValue' => $newData['newValue']
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