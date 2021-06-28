<?php

class DatabaseConnect
{
    protected PDO $db;
    private string $dsn = 'mysql:host=localhost'; // Do not declare database name here
    private string $username = 'root';
    private string $password = '';
    private array $option = [PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION];

    public function __construct()
    {
        try {
            $this->db = new PDO($this->dsn, $this->username, $this->password, $this->option);

            // Create database and tables if not exits
            $query = 'CREATE DATABASE IF NOT EXISTS `course_management` CHARACTER SET utf8 COLLATE utf8_vietnamese_ci';
            $this->db->prepare($query)->execute();
            $query = 'USE `course_management`';
            $this->db->prepare($query)->execute();
            $rolesTable = 'CREATE TABLE IF NOT EXISTS roles
                           (
                               id   INT AUTO_INCREMENT,
                               name VARCHAR(50) NOT NULL,
                               PRIMARY KEY (id)
                           )';
            $this->db->prepare($rolesTable)->execute();

            $usersTable = 'CREATE TABLE IF NOT EXISTS users
                           (
                               id      INT AUTO_INCREMENT,
                               role_id INT         NOT NULL,
                               name    VARCHAR(50) NOT NULL,
                               gender  VARCHAR(50) NOT NULL,
                               phone   VARCHAR(50) NOT NULL,
                               PRIMARY KEY (id),
                               FOREIGN KEY (role_id) REFERENCES roles (id)
                           )';
            $this->db->prepare($usersTable)->execute();
            $query = '-- Create majors table
            CREATE TABLE IF NOT EXISTS majors
            (
                id      INT AUTO_INCREMENT,
                name    VARCHAR(50) NOT NULL,
                user_id INT         NOT NULL,
                PRIMARY KEY (id),
                FOREIGN KEY (user_id) REFERENCES users (id)
            );

            -- Create classrooms table
            CREATE TABLE IF NOT EXISTS classrooms
            (
                id       INT AUTO_INCREMENT,
                name     VARCHAR(50) NOT NULL,
                major_id INT         NOT NULL,
                user_id  INT         NOT NULL,
                PRIMARY KEY (id),
                FOREIGN KEY (major_id) REFERENCES majors (id),
                FOREIGN KEY (user_id) REFERENCES users (id)
            );

            -- Create points table
            CREATE TABLE IF NOT EXISTS points
            (
                id         INT AUTO_INCREMENT,
                subject_id INT NOT NULL,
                point      DOUBLE, # Diem thi
                time       INT,    # So lan thi
                PRIMARY KEY (id)
            );';
            $this->db->prepare($query)->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}