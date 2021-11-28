<?php

namespace App\Models;

use PDO;

class EducationModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllEducation(): array
    {
        $query = $this->db->prepare('SELECT `id`, `level`,`institution`,`grade`,`start_date`, `end_date` FROM `education`;');
        $query->execute();
        return $query->fetchAll();
    }

    public function addEducation(string $level, string $institution, string $grade, string $start_date, string $end_date): bool
    {
        $mysql = "INSERT INTO `education` (`level`,`institution`,`grade`,`start_date`, `end_date`) VALUES (:level, :institution, :grade, :start_date, :end_date);";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'level' => $level,
            'institution' => $institution,
            'grade' => $grade,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];
        return ($query->execute($bindingParams));
    }

    public function editEducation(int $id, array $newData)
    {
        $educationFields = $this->getEducationFields();
//        if (!in_array(strtolower(trim($newData['field'])), $educationFields)) {
//            return false;
//        }
        $mysql = "UPDATE `education` SET `" . $newData['field'] . "` = :newValue WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id,
            'newValue' => $newData['newValue']
        ];
        return ($query->execute($bindingParams));
    }

    public function getEducationFields(): array
    {
        $mysql = "SELECT column_name as `Field` FROM information_schema.columns WHERE table_name='education' AND NOT column_name = 'id';";
        $query = $this->db->prepare($mysql);
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteEducation(int $id): bool
    {
        $mysql = "UPDATE `education` SET `deleted` = '1' WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id
        ];
        return ($query->execute($bindingParams));
    }
}