CREATE
    DATABASE IF NOT EXISTS `course_management`
    CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;

USE course_management;

-- Create roles table
CREATE TABLE IF NOT EXISTS roles
(
    id   INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

-- Create users table
CREATE TABLE IF NOT EXISTS users
(
    id      INT AUTO_INCREMENT,
    role_id INT         NOT NULL,
    name    VARCHAR(50) NOT NULL,
    gender  VARCHAR(50) NOT NULL,
    phone   VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (role_id) REFERENCES roles (id)
);

-- Create majors table
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
-- Create subjects table
CREATE TABLE IF NOT EXISTS subjects
(
    id   INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    credit_cart VARCHAR(25) NOT NULL,
    PRIMARY KEY (id)
);
-- Create points table
CREATE TABLE IF NOT EXISTS points
(
    id         INT AUTO_INCREMENT,
    user_id    INT NOT NULL,
    subject_id INT NOT NULL,
    point      DOUBLE, # Diem thi
    time       INT,    # So lan thi
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (subject_id) REFERENCES subjects (id)
);