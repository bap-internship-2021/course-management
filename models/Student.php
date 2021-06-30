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

    public function show(int $id)
    {
        try {
            $query = 'SELECT * FROM users WHERE id = :id';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); // id param must be int
            $stmt->execute();
            $subject = $stmt->fetch(PDO::FETCH_ASSOC); // get subject with id
            $stmt->closeCursor();

            return $subject;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function update($id, $name, $gender, $phone)
    {
        try {
            $query = 'UPDATE users SET name = :name, gender = :gender, phone = :phone WHERE id = :id';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':gender', $gender); 
            $stmt->bindValue(':phone', $phone); 
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); // id param must be int
            $result = $stmt->execute();
            $stmt->closeCursor();

            return $result;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}