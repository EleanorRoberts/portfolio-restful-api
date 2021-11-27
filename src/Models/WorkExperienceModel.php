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
        $query = $this->db->prepare('SELECT `id`, `company`,`position`,`start_date`,`leave_date`, `about` FROM `work_experience`;');
        $query->execute();
        return $query->fetchAll();
    }

    public function addWorkExperience(string $company, string $position, string $startDate, string $endDate): bool
    {
        $query = $this->db->prepare('INSERT INTO `workexperience` (`company`,`position`,`start_date`,`leave_date`) VALUES (:company, :position, :startDate, :leaveDate);');
        return($query->execute());
    }
}