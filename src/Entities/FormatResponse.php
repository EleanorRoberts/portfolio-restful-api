<?php

namespace App\Entities;

class FormatResponse
{
    public static function convertToDefault($attempt, $newEntryId = null): array {
        $message = ["success" => true, "message" => "All clear", "status" => 200];
        if (!($message['data'] = $attempt)) {
            $message["success"] = false;
            $message["message"] = "There was a problem :(";
            $message["status"] = 404;
        } else {
            if ($newEntryId !== null) {
                $message["message"] = "Thanks for the new entry!";
                $message['data'] = ['newDinoId' => $newEntryId] ;
            }
        }
        return ($message);
    }
}