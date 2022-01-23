<?php

namespace App\Entities;

use PDO;

class FormatResponse
{
    public static function convertToDefault($attempt, $message): array {
        $message = ["success" => true, "message" => $message, "status" => 200];
        if (!$attempt) {
            $message["success"] = false;
            $message["status"] = 400;
        }
        return $message;
    }
}