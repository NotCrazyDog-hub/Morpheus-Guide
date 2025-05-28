CREATE DATABASE morpheusguide;
USE morpheusguide;

CREATE TABLE Usuarios(
	id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nome VARCHAR(50)
);

CREATE TABLE RotinaS(
	id INT PRIMARY KEY AUTO_INCREMENT,
    Usuario_id INT,
    titulo VARCHAR(50),
    hora_de_acordar TIME NOT NULL,
    criado_em DATE NOT NULL,
    horario_de_dormir_escolhido TIME NOT NULL,
    FOREIGN KEY (Usuario_id) REFERENCES Usuarios(id) ON DELETE SET NULL
);

CREATE TABLE Diarios(
	id INT PRIMARY KEY AUTO_INCREMENT,
    Usuario_id INT,
    titulo VARCHAR(50),
    criado_em DATETIME NOT NULL,
    conteudo TEXT,
    FOREIGN KEY (Usuario_id) REFERENCES Usuarios(id) ON DELETE SET NULL
);

CREATE TABLE Horarios_ideais(
	id INT PRIMARY KEY AUTO_INCREMENT,
    Rotina_id INT,
    horarios_para_dormir TIME NOT NULL,
    FOREIGN KEY (Rotina_id) REFERENCES Rotina(id)
);