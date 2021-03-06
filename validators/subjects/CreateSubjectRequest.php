<?php

class CreateSubjectRequest
{
    public static function validateCreateInfoSubject(array $data): bool
    {
        $pattern = '/[^a-zA-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u';
        $isOk = true; // flag
        if (empty($data['name'])) {
            $_SESSION['create_subject']['name_error'] = 'Name must not be empty';
            $isOk = false;
        } elseif (!preg_match($pattern, $data['name'])) {
            $_SESSION['create_subject']['name_error'] = 'Name must be a string and not contain number(from 6 to 30 character)';
            $isOk = false;
        }
        if (empty($data['credit_number'])) {
            $_SESSION['create_subject']['credit_number_error'] = 'Credit number must not be empty';
            $isOk = false;
        } elseif (!is_numeric($data['credit_number'])) {
            $_SESSION['create_subject']['credit_number_error'] = 'Credit number must be a number';
            $isOk = false;
        }
        if ($isOk == true) {
            return true;
        } else {
            return false;
        }
    }
}