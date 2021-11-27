<?php

namespace App\Models;

use PDO;

class ProjectModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllProjects(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name`,`about`,`github_link`,`live_version` FROM `projects`;');
        $query->execute();
        return $query->fetchAll();
    }
}