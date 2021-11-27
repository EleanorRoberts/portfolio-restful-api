<?php

namespace App\Models;

use PDO;

class OtherCertificationsModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllOtherCertifications(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name`,`certifier`,`date_achieved` FROM `other_certifications`;');
        $query->execute();
        return $query->fetchAll();
    }
}