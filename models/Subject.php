<?php

require_once 'connection.php';

class Subject extends DatabaseConnect
{
    // Những field của model tương tác với database (The fields of model that contract with database)
    public int $id;
    public string $name;
    public int $credit_number;

    /**
     * Get all subjects from subjects table
     * @return array|false|void
     */
    public function index()
    {
        try {
            $query = 'SELECT * FROM subjects';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();

            return $subjects; // return to controller
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * Detail subject with id
     * @param int $id
     * @return mixed|void
     */
    public function show(int $id)
    {
        try {
            $query = 'SELECT * FROM subjects WHERE id = :id';
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

    public function update($id, $name, $credit_number)
    {
        try {
            $query = 'UPDATE subjects SET name = :name, credit_number = :credit_number WHERE id = :id';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':credit_number', $credit_number, PDO::PARAM_INT); // id param must be int
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); // id param must be int
            $result = $stmt->execute();
            $stmt->closeCursor();

            return $result;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}