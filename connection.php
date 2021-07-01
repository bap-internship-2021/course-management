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

            $query =    'CREATE TABLE IF NOT EXISTS roles
                        (
                            id   INT AUTO_INCREMENT,
                            name VARCHAR(50) NOT NULL,
                            PRIMARY KEY (id)
                        );
                        
              
                        CREATE TABLE IF NOT EXISTS users
                        (
                            id      INT AUTO_INCREMENT,
                            role_id INT         NOT NULL,
                            name    VARCHAR(50) NOT NULL,
                            gender  VARCHAR(50) NOT NULL,
                            phone   VARCHAR(50) NOT NULL,
                            PRIMARY KEY (id),
                            CONSTRAINT FK_Role_User FOREIGN KEY (role_id) REFERENCES roles (id)
                        );
                        
             
                        CREATE TABLE IF NOT EXISTS majors
                        (
                            id      INT AUTO_INCREMENT,
                            name    VARCHAR(50) NOT NULL,
                            user_id INT         NOT NULL,
                            PRIMARY KEY (id),
                            CONSTRAINT FK_User_Major FOREIGN KEY (user_id) REFERENCES users (id)
                        );
                        
                  
                        CREATE TABLE IF NOT EXISTS classrooms
                        (
                            id   INT AUTO_INCREMENT,
                            name VARCHAR(50) NOT NULL,
                            PRIMARY KEY (id)
                        );
                        
                  
                       CREATE TABLE IF NOT EXISTS classroom_details
                        (
                            id           INT AUTO_INCREMENT,
                            classroom_id INT NOT NULL,
                            major_id     INT NOT NULL,
                            user_id      INT NOT NULL,
                            CONSTRAINT FK_classrooms FOREIGN KEY (classroom_id) REFERENCES classrooms (id),
                            CONSTRAINT FK_majorsl FOREIGN KEY (major_id) REFERENCES majors (id),
                            CONSTRAINT FK_users FOREIGN KEY (user_id) REFERENCES users (id),
                            PRIMARY KEY (id)
                        );
            
                        CREATE TABLE IF NOT EXISTS subjects
                        (
                            id            INT AUTO_INCREMENT,
                            name          VARCHAR(50) NOT NULL,
                            credit_number VARCHAR(25) NOT NULL,
                            PRIMARY KEY (id)
                        );
                 
                        CREATE TABLE IF NOT EXISTS points
                        (
                            id         INT AUTO_INCREMENT,
                            user_id    INT NOT NULL,
                            subject_id INT NOT NULL,
                            point      DOUBLE, 
                            time       INT,    
                            PRIMARY KEY (id),
                            CONSTRAINT FK_User_Point FOREIGN KEY (user_id) REFERENCES users (id),
                            CONSTRAINT FK_Subject_Point FOREIGN KEY (subject_id) REFERENCES subjects (id)
                        );';
            $this->db->prepare($query)->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}