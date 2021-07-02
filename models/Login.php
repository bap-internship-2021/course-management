<?php
require_once 'connection.php';

Class Login extends DatabaseConnect
{
    public function userLogin($email, $password)
    {
        try {
            $query = 'SELECT * FROM admins WHERE (email = :email) AND (password = :password)';
            $statement = $this->db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password, PDO::PARAM_STR_CHAR);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $user;
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}
