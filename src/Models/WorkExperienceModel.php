<?php

namespace App\Models;

use PDO;

class WorkExperienceModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllWorkExperience(): array
    {
        $query = $this->db->prepare("SELECT `id`, `company`,`position`,`start_date`,`leave_date`, `about` FROM `work_experience` WHERE `deleted` = '0';");
        $query->execute();
        return $query->fetchAll();
    }

    public function addWorkExperience(string $company, string $position, string $startDate, string $leaveDate): bool
    {
        $mysql = "INSERT INTO `work_experience` (`company`,`position`,`start_date`,`leave_date`) VALUES (:company, :position, :start_date, :leave_date);";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'company' => $company,
            'position' => $position,
            'start_date' => $startDate,
            'leave_date' => $leaveDate
        ];
        return ($query->execute($bindingParams));
    }

    public function editWorkExperience(int $id, array $newData): bool
    {
        $workExperienceFields = $this->getWorkExperienceFields();
//        if (!in_array(strtolower(trim($newData['field'])), $workExperienceFields)) {
//            return false;
//        }
        $mysql = "UPDATE `work_experience` SET :field = :newValue WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id,
            'field' => $newData['field'],
            'newValue' => $newData['newValue']
        ];
        return ($query->execute($bindingParams));
    }

    public function getWorkExperienceFields(): array
    {
        $mysql = "SELECT column_name as `Field` FROM information_schema.columns WHERE table_name='work_experience' AND NOT column_name = 'id' AND NOT column_name = 'deleted';";
        $query = $this->db->prepare($mysql);
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteWorkExperience(int $id): bool
    {
        $mysql = "UPDATE `work_experience` SET `deleted` = '1' WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id
        ];
        return ($query->execute($bindingParams));
    }
}