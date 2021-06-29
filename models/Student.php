<?php
require_once 'connection.php';

class Student extends DatabaseConnect
{
    public int $id;
    public int $role_id;
    public string $name;
    public string $gender;
    public string $phone;

    // Constant
    const TEACHER_ROLE = 1; // teacher role
    const STUDENT_ROLE = 2; // student role
    const FEMALE_GENDER = 0; // female gender
    const MALE_GENDER = 1; // male gender

    public function listStudents()
    {
        try {
            $query = 'SELECT * FROM users WHERE role_id  = :role_id';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':role_id', self::STUDENT_ROLE);
            $stmt->execute();
            $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
          
            return $subjects; // return to controller
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}