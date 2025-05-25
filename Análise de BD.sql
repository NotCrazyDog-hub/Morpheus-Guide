USE morpheus;

CREATE TABLE usuarios (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(100),
    senha VARCHAR(50)
);

CREATE TABLE rotinas (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario_id INT,
    hora_de_acordar TIME,
    hora_de_dormir TIME,
    intervalo_de_tempo TIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE diarios (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario_id INT,
    titulo VARCHAR(50),
    texto TEXT,
    criado_em DATETIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);