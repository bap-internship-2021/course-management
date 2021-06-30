<?php

require_once 'connection.php';

class Teacher extends DatabaseConnect
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
    public function listTeachers()
    {
        try {
            $query = 'SELECT * FROM users WHERE role_id  = :role_id';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':role_id', self::TEACHER_ROLE);
            $stmt->execute();
            $teacher = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
          
            return $teacher; // return to controller
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function store($name, $gender, $phone)
    {
        // var_dump($role_id);die();
        try {
            $query = 'INSERT INTO users (name, gender, phone, role_id) VALUES (:name, :gender, :phone, :role_id)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':gender', $gender); 
            $stmt->bindValue(':phone', $phone); 
            $stmt->bindValue(':role_id', Teacher::TEACHER_ROLE); 
            $result = $stmt->execute();
            $stmt->closeCursor();
            return $result; // return to controller
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
            $teacher = $stmt->fetch(PDO::FETCH_ASSOC); // get subject with id
            $stmt->closeCursor();

            return $teacher;
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
            $teacher = $stmt->execute();
            $stmt->closeCursor();

            return $teacher;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}