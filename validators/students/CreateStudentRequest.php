<?php

class CreateStudentRequest
{
    public static function validateCreateInfoStudent(array $data): bool
    {
        $isOk = true; // flag

        if (empty($data['name'])) {
            $_SESSION['create_student']['name_error'] = 'Name must not be empty';
            $isOk = false;
        } elseif (!preg_match('/^[a-zA-Z\s]{6,30}$/', $data['name'])) {
            $_SESSION['create_student']['name_error'] = 'Name must be a string and not contain number(from 6 to 30 character)';
            $isOk = false;
        }

        if (empty($data['gender'])) {
            $_SESSION['create_student']['gender_error'] = 'gender must not be empty';
            $isOk = false;
        } elseif (!preg_match('/^[a-zA-Z\s]{6,30}$/', $data['gender'])) {
            $_SESSION['create_student']['gender_error'] = 'gender must be a number';
            $isOk = false;
        }

        if (empty($data['phone'])) {
            $_SESSION['create_student']['phone_error'] = 'phone must not be empty';
            $isOk = false;
        } elseif (!preg_match('/^[a-zA-Z\s]{6,30}$/', $data['phone'])) {
            $_SESSION['create_student']['phone_error'] = 'phone must be a number';
            $isOk = false;
        }

        if (empty($data['role_id'])) {
            $_SESSION['create_student']['Role_id_error'] = 'Role_id must not be empty';
            $isOk = false;
        } elseif (!is_numeric($data['credit_number'])) {
            $_SESSION['create_student']['Role_iderror'] = 'Role_id must be a number';
            $isOk = false;
        }

        if ($isOk == true) {
            return true;
        } else {
            return false;
        }
    }
}