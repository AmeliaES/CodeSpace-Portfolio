-- Database name is called MKTIMEportfolio

-- Make a table called users, this will store information on
-- first name, last name, email address, phone number, address line 1, address line 2,
-- country, password

CREATE TABLE IF NOT EXISTS users (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20),
    address_line_1 VARCHAR(255) NOT NULL,
    address_line_2 VARCHAR(255),
    country VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date DATETIME NOT NULL,
    PRIMARY KEY (user_id),
    UNIQUE (email)
);
