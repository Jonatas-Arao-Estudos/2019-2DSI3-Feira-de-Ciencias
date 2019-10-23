CREATE DATABASE tb_feira;

USE tb_feira;

CREATE TABLE visitantes (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    periodoestudo VARCHAR(25) NOT NULL,
    idade INT NOT NULL,
    sexo VARCHAR(25) NOT NULL
)