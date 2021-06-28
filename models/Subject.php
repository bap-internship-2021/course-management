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
}