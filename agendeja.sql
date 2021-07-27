CREATE TABLE medical_clinics (
    id_medclinic INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    tel VARCHAR(15) NOT NULL,
    address TEXT(255) NOT NULL,
    cnpj VARCHAR(14) NOT NULL,
    is_active BOOLEAN DEFAULT true

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
    is_active BOOLEAN DEFAULT true,
    id_medclinic INT,
    FOREIGN KEY (id_medclinic) REFERENCES medical_clinics(id_medclinic)
);

CREATE TABLE doctors (
    id_doctor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    tel VARCHAR(15) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE request_consultation (
    id_consultation INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    approved BOOLEAN DEFAULT false,
    id_patient INT,
    FOREIGN KEY (id_patient) REFERENCES patients(id_patient),
    id_medclinic INT,
    FOREIGN KEY (id_medclinic) REFERENCES medical_clinics(id_medclinic),
    id_secretary INT,
    FOREIGN KEY (id_secretary) REFERENCES secretaries(id_secretary),
    date DATETIME NOT NULL
);

/*CREATE TABLE calendar (
    id_calendar INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date DATETIME NOT NULL
    valid BOOLEAN DEFAULT false
);

CREATE TABLE schedule (
    id_schedule INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_consultation INT,
    FOREIGN KEY (id_consultation) REFERENCES request_consultation(id_consultation),
    id_calendar INT,
    FOREIGN KEY (id_calendar) REFERENCES calendar(id_calendar)
);*/