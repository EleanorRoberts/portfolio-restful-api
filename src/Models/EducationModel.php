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
}