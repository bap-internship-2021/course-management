<?php
require_once 'connection.php';

class Data extends DatabaseConnect
{
    // const 
    const TEACHER_ROLE = 1; // teacher role
    const STUDENT_ROLE = 2; // student role
    const FEMALE_GENDER = 2; // female gender
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

    public function quantityAvgPoints()
    {
        try {
            $query = 'SELECT users.name, users.role_id, AVG(points.point) as Average FROM users
                        INNER JOIN points ON users.id = points.user_id WHERE role_id  = :role_id GROUP BY users.name';
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

    public function listStudentPoin()
    {
        try {
            $query = 'SELECT u.name, p.point
                      FROM users as u
                      INNER JOIN points p on u.id = p.user_id
                      WHERE u.role_id = :role_id;';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':role_id', self::STUDENT_ROLE);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $results; // return to controller
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    public function listStudentByClass()
    {
        try {
            $query = 'SELECT u.name, p.point, c.name
                      FROM points p
                      INNER JOIN users u ON p.user_id = p.user_id
                      INNER JOIN classroom_details cd on u.id = cd.user_id
                      INNER JOIN classrooms c on cd.classroom_id = c.id
                      WHERE u.role_id = 2';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':role_id', self::STUDENT_ROLE);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $results; // return to controller
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

}
