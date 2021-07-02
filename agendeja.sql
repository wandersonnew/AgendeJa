CREATE TABLE medical_clinics (
    id_medclinic INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    tel VARCHAR(15) NOT NULL,
    address TEXT(255) NOT NULL,
    cnpj VARCHAR(14) NOT NULL,
    is_active BOOLEAN DEFAULT false

);

CREATE TABLE patients (
    id_patient INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    tel VARCHAR(15),
    address TEXT(255) NOT NULL,
    password VARCHAR(100)
);

CREATE TABLE secretaries (
    id_secretary INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    tel VARCHAR(15) NOT NULL,
    password VARCHAR(100) NOT NULL,
    is_super BOOLEAN DEFAULT false,
    is_active BOOLEAN DEFAULT false,
    id_medclinic int,
    foreign key (id_medclinic) references medical_clinics(id_medclinic)
);

CREATE TABLE doctors (
    id_doctor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    tel VARCHAR(15) NOT NULL,
    password VARCHAR(100) NOT NULL
);