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
    id          INT AUTO_INCREMENT,
    name        VARCHAR(50) NOT NULL,
    credit_number VARCHAR(25) NOT NULL,
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

# Insert record
INSERT INTO users (role_id, name, gender, phone)
VALUES (1, 'Trang', 0, '242342422'),
       (1, 'Tuan', 1, '08333333'),
       (1, 'Phong', 1, '035666666'),
       (1, 'Loan', 0, '043534554'),
       (0, 'Phuong', 0, '0324324234'),
       (0, 'PHUOC TRAN', 1, '3423423'),
       (0, 'Quang', 1, '234234444'),
       (0, 'Minh', 1, '756456456'),
       (0, 'Hieu', 1, '255552222'),
       (0, 'Trinh', 0, '234234234');

INSERT INTO majors (name, user_id)
VALUES ('CNTT', 1),
       ('Du lịch', 2),
       ('Marketing', 3),
       ('Business', 4);

INSERT INTO classrooms(name, major_id, user_id)
VALUES ('lop A2', 1, 2),
       ('lop B3', 1, 3),
       ('lop B4', 2, 5);

INSERT INTO subjects(name, credit_number)
VALUES ('Toan', 3),
       ('Networking', 1),
       ('Security', 4);


