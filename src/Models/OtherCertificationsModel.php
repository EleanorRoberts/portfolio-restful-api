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
        $query = $this->db->prepare('SELECT `id`, `name`,`certifier`,`date_achieved` FROM `other_certifications` WHERE `deleted` = 0;');
        $query->execute();
        return $query->fetchAll();
    }

    public function addOtherCertification(string $name, string $certifier = null, string $date_achieved = null): bool
    {
        $mysql = 'INSERT INTO `other_certifications` (`name`,`certifier`,`date_achieved`) VALUES (:name, :certifier, :date_achieved);';
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'name' => $name,
            'certifier' => $certifier,
            'date_achieved' => $date_achieved
        ];
        return ($query->execute($bindingParams));
    }

    public function editOtherCertification(int $id, array $newData)
    {
//        $otherCertificationsFields = $this->getOtherCertificationsFields();
//        if (!in_array(strtolower(trim($newData['field'])), $otherCertificationsFields)) {
//            return false;
//        }
        $mysql = "UPDATE `other_certifications` SET `" . $newData['field'] . "` = :newValue WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id,
            'newValue' => $newData['newValue']
        ];
        return ($query->execute($bindingParams));
    }

    public function getOtherCertificationsFields(): array
    {
        $mysql = "SELECT column_name as `Field` FROM information_schema.columns WHERE table_name='other_certifications' AND NOT column_name = 'id';";
        $query = $this->db->prepare($mysql);
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteOtherCertification(int $id): bool
    {
        $mysql = "UPDATE `other_certifications` SET `deleted` = '1' WHERE `id` = :id;";
        $query = $this->db->prepare($mysql);
        $bindingParams = [
            'id' => $id
        ];
        return ($query->execute($bindingParams));
    }
}