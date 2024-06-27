CREATE DATABASE clinic3;

USE clinic3;

CREATE TABLE patients (
patient_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
email VARCHAR(40) NOT NULL UNIQUE,
password VARCHAR(100) NOT NULL,
role VARCHAR(20) DEFAULT 'patient' NOT NULL
);

CREATE TABLE specialist(
specialist_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
email VARCHAR(40) NOT NULL UNIQUE,
password VARCHAR(100) NOT NULL,
specialization VARCHAR(100),
role VARCHAR(20) DEFAULT 'doctor' NOT NULL
);

CREATE TABLE availability (
availability_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
specialist_id INT NOT NULL,
name VARCHAR(50) NOT NULL DEFAULT 'Badanie',
start_time DATETIME NOT NULL,
end_time DATETIME NOT NULL,
price DECIMAL DEFAULT 0.0 NULL,
FOREIGN KEY (specialist_id) REFERENCES specialist(specialist_id)
);

CREATE TABLE appointments (
appointment_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
patient_id INT NOT NULL,
doctor_id INT NOT NULL,
name VARCHAR(50) NOT NULL DEFAULT 'Badanie',
appointment_date DATETIME NOT NULL,
status VARCHAR(30) DEFAULT 'scheduled',
price DECIMAL DEFAULT 0.0 NULL,
notes TEXT,
FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
FOREIGN KEY (doctor_id) REFERENCES specialist(specialist_id)
);

CREATE TABLE conversations (
conversation_id INT AUTO_INCREMENT PRIMARY KEY,
patient_id INT NOT NULL,
doctor_id INT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
FOREIGN KEY (doctor_id) REFERENCES specialist(specialist_id)
);

CREATE TABLE messages (
message_id INT AUTO_INCREMENT PRIMARY KEY,
conversation_id INT NOT NULL,
sender_id INT NOT NULL,
sender_role ENUM('patient', 'doctor') NOT NULL,
message_text TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (conversation_id) REFERENCES conversations(conversation_id)
);

CREATE TABLE surveys (
id INT AUTO_INCREMENT,
q1 TINYINT,  -- Jakość usług (1-5)
q2 ENUM('yes', 'no'),  -- Czy poleciłbyś/łabyś nasze usługi innym?
q3 TINYINT,  -- Lokalizacja przychodni (1-5)
q4 TINYINT,  -- Lekarz z którym ostatnio miałeś kontakt (1-5)
comment TEXT,  -- Co chciałbyś zmienić w naszych usługach?
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id)
);

INSERT INTO specialist (first_name, last_name, email, password, specialization) VALUES
('Jan', 'Kowalski', 'jan.kowalski@example.com', 'password1', 'Dentysta'),
('Anna', 'Nowak', 'anna.nowak@example.com', 'password2', 'Ortodonta'),
('Piotr', 'Zieliński', 'piotr.zielinski@example.com', 'password3', 'Chirurg stomatologiczny'),
('Maria', 'Wiśniewska', 'maria.wisniewska@example.com', 'password4', 'Periodontolog'),
('Tomasz', 'Wójcik', 'tomasz.wojcik@example.com', 'password5', 'Endodonta'),
('Agnieszka', 'Kowalczyk', 'agnieszka.kowalczyk@example.com', 'password6', 'Protetyk');


INSERT INTO appointments (patient_id, doctor_id, name, appointment_date, status, price, notes) VALUES
(1, 1, 'Badanie kontrolne', '2024-07-01 10:00:00', 'scheduled', 100.0, 'Regular checkup'),
(1, 2, 'Ortodonta', '2024-07-02 11:00:00', 'scheduled', 150.0, 'Consultation for braces'),
(1, 3, 'Chirurg', '2024-07-03 09:00:00', 'scheduled', 200.0, 'Wisdom tooth removal'),
(2, 4, 'Periodontolog', '2024-07-04 08:00:00', 'scheduled', 120.0, 'Gum disease treatment'),
(2, 5, 'Endodonta', '2024-07-05 12:00:00', 'scheduled', 130.0, 'Root canal treatment'),
(2, 6, 'Protetyk', '2024-07-06 14:00:00', 'scheduled', 140.0, 'Dental prosthesis fitting');

