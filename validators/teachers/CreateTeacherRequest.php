<?php

class CreateTeacherRequest
{
    public static function validateCreateInfoTeacher(array $data): bool
    {
        $pattern = '/[^a-zA-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u';
        $isOk = true; // flag

        if (empty($data['name'])) {
           
            $_SESSION['create_teacher']['name_error'] = 'Name must not be empty';
            $isOk = false;
        } elseif (!preg_match($pattern, $data['name'])) {
            echo "bac"; exit();
            $_SESSION['create_teacher']['name_error'] = 'Name must be a string and not contain number(from 6 to 30 character)';
            $isOk = false;
        }

        if (empty($data['gender'])) {
            $_SESSION['create_teacher']['gender_error'] = 'gender must not be empty';
            $isOk = false;
        } elseif (!is_numeric($data['gender'])) {
            $_SESSION['create_teacher']['gender_error'] = 'gender must be a number';
            $isOk = false;
        }

        if (empty($data['phone'])) {
            $_SESSION['create_teacher']['phone_error'] = 'phone must not be empty';
            $isOk = false;
        } elseif (!is_numeric($data['phone'])) {
            $_SESSION['create_teacher']['phone_error'] = 'phone must be a number';
            $isOk = false;
        }

        if (empty($data['role_id'])) {
            $_SESSION['create_teacher']['Role_id_error'] = 'Role_id must not be empty';
            $isOk = false;
        } elseif (!is_numeric($data['credit_number'])) {
            $_SESSION['create_teacher']['Role_iderror'] = 'Role_id must be a number';
            $isOk = false;
        }

        if ($isOk == true) {
            return true;
        } else {
            return false;
        }
    }
}