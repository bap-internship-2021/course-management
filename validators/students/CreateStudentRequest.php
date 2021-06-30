<?php

class CreateStudentRequest
{
    public static function validateCreateInfoStudent(array $data): bool
    {
        $pattern = '/[^a-zA-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u';
        $isOk = true; //flag
        if (empty($data['name'])) {
            $_SESSION['create_student']['name_error'] = 'Name must not be empty';
            $isOk = false;
        } elseif (!preg_match($pattern, $data['name'])) {
            $_SESSION['create_student']['name_error'] = 'Names must be a string and not contain number((from 6 to 30 character))';
            $isOk = false;
        }

        if (empty($data['gender'])) {
            $_SESSION['create_student']['gender_error'] = 'gender must not be empty';
            $isOk = false;
        } elseif (!is_numeric($data['gender'])) {
            $_SESSION['create_student']['gender_error'] = 'gender must be a number';
            $isOk = false;
        }

        if (empty($data['phone'])) {
            $_SESSION['create_student']['phone_error'] = 'phone must not be empty';
            $isOk = false;
        } elseif (!preg_match('/^[0-9]{10}$/', $data['phone'])) {
            $_SESSION['create_student']['phone_error'] = 'phone must be contain 10 character';
            $isOk = false; // return false 
        }

        

        if ($isOk == true) {
            return true;
        } else {
            return false;
        }
    }
}