CREATE DATABASE gamesite;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    email VARCHAR(40) NOT NULL,
    senha VARCHAR(60) NOT NULL,
    nascimento DATE NOT NULL,
    PRIMARY KEY(id),
    UNIQUE(email)
);
