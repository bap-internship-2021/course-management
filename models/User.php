<?php

require_once 'connection.php';

class User extends DatabaseConnect
{
    // Những field của model tương tác với database (The fields of model that contract with database)


    public int $id;
    
    public string $name;
    public string $gender;
    public string $phone;

    // Constant
    const TEACHER_ROLE = 1; // teacher role
    const STUDENT_ROLE = 2; // student role
    const FEMALE_GENDER = 0; // female gender
    const MALE_GENDER = 1; // male gender

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
        try {
            $query = 'SELECT * FROM users';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $subjects; // return to controller
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}