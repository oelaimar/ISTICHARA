CREATE TABLE city(
                     id INT PRIMARY KEY AUTO_INCREMENT,
                     name VARCHAR(150) NOT NULL
);

CREATE TABLE lawyer(
                       id INT PRIMARY KEY AUTO_INCREMENT,
                       name VARCHAR(150) NOT NULL,
                       email VARCHAR(250) NOT NULL UNIQUE,
                       phone VARCHAR(30) NOT NULL UNIQUE,
                       years_of_experience INT,
                       hourly_rate DECIMAL (10,2),
                       specialization ENUM('Criminal Law', 'Civil', 'Family', 'Business') NOT NULL,
                       consultation_online BOOL,
                       city_id INT,
                       FOREIGN KEY (city_id) REFERENCES city(id)
);

CREATE TABLE bailiff(
                        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                        name VARCHAR(150) NOT NULL,
                        email VARCHAR(250) NOT NULL UNIQUE,
                        phone VARCHAR(30) NOT NULL UNIQUE,
                        years_of_experience INT,
                        hourly_rate DECIMAL(10, 2),
                        type ENUM('Serving', 'Enforcement', 'Verification'),
                        city_id INT,
                        FOREIGN KEY (city_id) REFERENCES city(id)
);