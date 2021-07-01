CREATE
    DATABASE IF NOT EXISTS `course_management`
    CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;

USE course_management;
CREATE TABLE IF NOT EXISTS admins
(
    id   INT AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);
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
    CONSTRAINT FK_Role_User FOREIGN KEY (role_id) REFERENCES roles (id)
);

-- Create majors table
CREATE TABLE IF NOT EXISTS majors
(
    id      INT AUTO_INCREMENT,
    name    VARCHAR(50) NOT NULL,
    user_id INT         NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_User_Major FOREIGN KEY (user_id) REFERENCES users (id)
);

-- Create classrooms table
CREATE TABLE IF NOT EXISTS classrooms
(
    id   INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

-- Create classroom_details table
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

-- Create subjects table
CREATE TABLE IF NOT EXISTS subjects
(
    id            INT AUTO_INCREMENT,
    name          VARCHAR(50) NOT NULL,
    credit_number VARCHAR(25) NOT NULL,
    PRIMARY KEY (id)
);
-- Create points table
CREATE TABLE IF NOT EXISTS points
(
    id         INT AUTO_INCREMENT,
    user_id    INT NOT NULL,
    subject_id INT NOT NULL,
    point      DOUBLE, -- Diem thi
    time       INT,    -- So lan thi
    PRIMARY KEY (id),
    CONSTRAINT FK_User_Point FOREIGN KEY (user_id) REFERENCES users (id),
    CONSTRAINT FK_Subject_Point FOREIGN KEY (subject_id) REFERENCES subjects (id)
);


-- Insert record
USE course_management;
INSERT INTO admins (email, password)
VALUES ('admin@gmail.com', '123456789');

INSERT INTO roles (name)
VALUES ('Teacher'), -- id = 1
       ('Student'); -- id = 2

INSERT INTO users (role_id, name, gender, phone)
VALUES (1, 'Trang', 0, '242342422'),
       (1, 'Tuan', 1, '08333333'),
       (1, 'Phong', 1, '035666666'),
       (1, 'Loan', 0, '043534554'),
       (2, 'Phuong', 0, '0324324234'),
       (2, 'PHUOC TRAN', 1, '3423423'),
       (2, 'Quang', 1, '234234444'),
       (2, 'Minh', 1, '756456456'),
       (2, 'Hieu', 1, '255552222'),
       (2, 'Trinh', 0, '234234234');

INSERT INTO majors (name, user_id)
VALUES ('Information technology', 1),
       ('Du lịch', 2),
       ('Marketing', 3),
       ('Business', 4);

INSERT INTO classrooms(name)
VALUES ('lop A2'),
       ('lop B3'),
       ('lop B4');

INSERT INTO classroom_details(classroom_id, major_id, user_id)
VALUES (1, 1, 1),
       (2, 2, 2),
       (3, 3, 3);

INSERT INTO subjects(name, credit_number)
VALUES ('Programing', 1),
       ('Networking', 2),
       ('Security', 3),
       ('Project management', 5);

INSERT INTO points(subject_id, user_id, point, time)
VALUES (1, 5, 10, 1),
       (2, 6, 8, 2),
       (3, 7, 9, 1),
       (3, 8, 9, 1),
       (4, 9, 10, 1);
