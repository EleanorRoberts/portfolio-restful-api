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
}