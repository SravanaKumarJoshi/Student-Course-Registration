CREATE DATABASE IF NOT EXISTS course_db;
USE course_db;

CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    max_seats INT
);

CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student VARCHAR(100),
    course_id INT,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);
