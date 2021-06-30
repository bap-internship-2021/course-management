<?php


class EditStudentRequest
{
    public static function validateEditInfoStudent(array $data): bool
    {
        $isOk = true; //flag
        if (empty($data['name'])) {
            $_SESSION['edit_student']['name_error'] = 'Name must not be empty';
            $isOk = false;
        } elseif (!preg_match('/^[a-zA-Z\s]{1,30}$/', $data['name'])) {
            $_SESSION['edit_student']['name_error'] = 'Name must be a string and not contain number((from 6 to 30 character))';
            $isOk = false;
        }

        if (empty($data['gender'])) {
            $_SESSION['edit_student']['gender_error'] = 'gender must not be empty';
            $isOk = false;
        } elseif (!is_numeric($data['gender'])) {
            $_SESSION['edit_student']['gender_error'] = 'gender must be a number';
            $isOk = false;
        }

        if (empty($data['phone'])) {
            $_SESSION['edit_student']['phone_error'] = 'phone must not be empty';
            $isOk = false;
        } elseif (!preg_match('/^[0-9]{10}$/', $data['phone'])) {
            $_SESSION['edit_student']['phone_error'] = 'phone must be contain 10 character';
            $isOk = false; // return false 
        }

        if ($isOk == true) {
            return true;
        } else {
            return false;
        }
    }
}