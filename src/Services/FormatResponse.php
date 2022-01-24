<?php

namespace App\Services;

class FormatResponse
{
    public static function convertToDefault(string $message, bool $attempt = true, array $data = []): array {
        if (!empty($data)) {
            return ["success" => $attempt, "message" => $message, "data" => $data];
        }
        return ["success" => $attempt, "message" => $message];
    }
}