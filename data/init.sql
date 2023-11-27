CREATE DATABASE test;
-- make sure to use test for the rest of the code
use test;
-- id is auto incremented, with each new entry. making sure that id is unique.
-- it's also the primary key
-- not nul so the field cant be empty
CREATE TABLE users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
age INT(3),
location VARCHAR(50),
date TIMESTAMP
);