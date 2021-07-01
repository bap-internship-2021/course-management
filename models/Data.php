<?php
require_once 'connection.php';

class Data extends DatabaseConnect 
{
    // const 
    const TEACHER_ROLE = 1; // teacher role
    const STUDENT_ROLE = 2; // student role
    const FEMALE_GENDER = 0; // female gender
    const MALE_GENDER = 1; // male gender

    public function quantityStudentsMajors()
    {
        try {
            $query = 'SELECT COUNT(users.id) as StudentCount, majors.name FROM users
                        INNER JOIN majors ON users.major_id = majors.id WHERE role_id  = :role_id GROUP BY majors.name';    
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':role_id', self::STUDENT_ROLE);
            $stmt->execute();
            $quantity = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $quantity; // return to controller
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function quantitySubjectsMajors()
    {
        try {
            $query = 'SELECT COUNT(subjects.id) as SubjectCount, majors.name FROM subjects
                        INNER JOIN majors ON majors.id = subjects.major_id GROUP BY majors.name';    
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $quantity = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $quantity; // return to controller
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}
