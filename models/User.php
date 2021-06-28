<?php

require_once 'connection.php';

class User extends DatabaseConnect
{
    // Những field của model tương tác với database (The fields of model that contract with database)
const STUDENT_ROLE = 0;
const TEACHER_ROLE = 1;
    public int $id;
    public int $role_id;
    public string $name;

    // Constant
        public string $gender; // Student role
        public string $phone; // Teacher role

    public function checkDatabase()
    {
        try {
            return parent::__construct(); // Call Database Connection constructor
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Get all user in resources
     */
    public function index()
    {

    }
}