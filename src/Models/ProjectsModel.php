<?php

namespace App\Models;

use PDO;

class ProjectsModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllProjects(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name`,`about`,`github_link`,`live_version` FROM `projects` WHERE `deleted` = 0;');
        $query->execute();
        return $query->fetchAll();
    }

    public function addProject(string $name, string $about, string $githubLink = null, string $liveVersion = null): bool
    {
        $mysql = 'INSERT INTO `projects` (`name`,`about`,`github_link`,`live_version`) VALUES (:name, :about, :github_link, :live_version);';
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'name' => $name,
            'about' => $about,
            'github_link' => $githubLink,
            'live_version' => $liveVersion
        ];
        return ($query->execute($bindingParams));
    }

    public function editProject(int $id, array $newData): bool
    {
        $projectFields = $this->getProjectFields();
//        if (!in_array(strtolower(trim($newData['field'])), $projectFields)) {
//            return false;
//        }
        $mysql = "UPDATE `projects` SET `" . $newData['field'] . "` = :newValue WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id,
            'newValue' => $newData['newValue']
        ];
        return ($query->execute($bindingParams));
    }

    public function getProjectFields(): array
    {
        $mysql = "SELECT column_name as `Field` FROM information_schema.columns WHERE table_name='projects' AND NOT column_name = 'id';";
        $query = $this->db->prepare($mysql);
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteProject(int $id): bool
    {
        $mysql = "UPDATE `projects` SET `deleted` = '1' WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id
        ];
        return ($query->execute($bindingParams));
    }
}