<?php

namespace App\Entities;

class Validator
{
    public static function validateAddAboutMe(array $data): bool {
        $nameValidation = self::validateShortString($data['name']);
        $descriptionValidation = self::validateLongString($data['description']);
        return ($nameValidation && $descriptionValidation);
    }

    public static function validateEditAboutMe(array $data): bool {
        $validation = false;
        switch ($data['field']) {
            case 'name' :
                $validation = self::validateShortString($data['newValue']);
                break;
            case 'description' :
                $validation = self::validateLongString($data['newValue']);
                break;
        }
        return $validation;
    }

    public static function validateAddEducation(array $data): bool {
        $levelValidation = self::validateShortString($data['level']);
        $institutionValidation = self::validateShortString($data['institution']);
        if (isset($data['grade'])) {
            $gradeValidation = self::validateShortString($data['grade']);
        }
        if (isset($data['startDate'])) {
            $startDateValidation = self::validateDate($data['startDate']);
        }
        if (isset($data['endDate'])) {
            $endDateValidation = self::validateDate($data['endDate']);
        }
        return $levelValidation && $institutionValidation && ($gradeValidation ?? true) && ($startDateValidation ?? true) && ($endDateValidation ?? true);
    }

    public static function validateEditEducation(array $data): bool {
        $validation = false;
        switch ($data['field']) {
            case 'level' || 'institution' || 'grade' :
                $validation = self::validateShortString($data['newValue']);
                break;
            case 'startDate' || 'endDate':
                $validation = self::validateDate($data['newValue']);
                break;
        }
        return $validation;
    }

    public static function validateAddHobby(array $data): bool {
        return self::validateShortString($data['name']);
    }

    public static function validateEditHobby(array $data): bool {
        return self::validateShortString($data['newValue']);
    }

    public static function validateAddOtherCertification(array $data): bool {
        $nameValidation = self::validateShortString($data['name']);
        if (isset($data['certifier'])) {
            $certifierValidation = self::validateShortString($data['certifier']);
        }
        if (isset($data['achievedData'])) {
            $achievedDateValidation = self::validateDate($data['achievedDate']);
        }
        return $nameValidation && ($certifierValidation ?? true) && ($achievedDateValidation ?? true);
    }

    public static function validateEditOtherCertification(array $data): bool {
        $validation = false;
        switch ($data['field']) {
            case 'name' || 'certifier' :
                $validation = self::validateShortString($data['newValue']);
                break;
            case 'achievedDate':
                $validation = self::validateDate($data['newValue']);
                break;
        }
        return $validation;
    }

    public static function validateAddProject(array $data): bool {
        $nameValidation = self::validateShortString($data['name']);
        $aboutValidation = self::validateLongString($data['about']);
        if (isset($data['githubLink'])) {
            $githubLinkValidation = self::validateUrl($data['githubLink']);
        }
        if (isset($data['liveVersion'])) {
            $liveVersionValidation = self::validateUrl($data['liveVersion']);
        }
        return $nameValidation && $aboutValidation && ($githubLinkValidation ?? true) && ($liveVersionValidation ?? true);
    }

    public static function validateEditProject(array $data): bool {
        $validation = false;
        switch ($data['field']) {
            case 'name' :
                $validation = self::validateShortString($data['newValue']);
                break;
            case 'about' :
                $validation = self::validateLongString($data['newValue']);
                break;
            case 'githubLink' || 'liveVersion' :
                $validation = self::validateUrl($data['newValue']);
                break;
        }
        return $validation;
    }

    public static function validateAddWorkExperience(array $data): bool {
        $companyValidation = self::validateShortString($data['company']);
        $positionValidation = self::validateShortString($data['position']);
        if (isset($data['startDate'])) {
            $startDateValidation = self::validateDate($data['startDate']);
        }
        if (isset($data['leaveDate'])) {
            $leaveDateValidation = self::validateDate($data['leaveDate']);
        }
        return $companyValidation && $positionValidation && ($startDateValidation ?? true) && ($leaveDateValidation ?? true);
    }

    public static function validateEditWorkExperience(array $data): bool {
        $validation = false;
        switch ($data['field']) {
            case 'company' || 'position' :
                $validation = self::validateShortString($data['newValue']);
                break;
            case 'startDate' || 'endDate' :
                $validation = self::validateDate($data['newValue']);
                break;
            case 'about' :
                $validation = self::validateLongString($data['newValue']);
                break;
            case 'githubLink' || 'liveVersion' :
                $validation = self::validateUrl($data['newValue']);
                break;
        }
        return $validation;
    }

    protected static function validateShortString(string $string): bool {
        $length = strlen($string);
        return 0 <= $length && $length <= 50;
    }

    protected static function validateLongString(string $string): bool {
        $length = strlen($string);
        return 20 <= $length && $length <= 600;
    }

    protected static function validateDate(string $date): bool {
        $regex = '/^[12][901]\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/';
        return preg_match($regex, $date);
    }

    protected static function validateUrl(string $date): bool {
        $regex = '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu';
        return preg_match($regex, $date);
    }
}