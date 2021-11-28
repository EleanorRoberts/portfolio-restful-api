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
}