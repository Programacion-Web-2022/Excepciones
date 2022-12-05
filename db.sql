CREATE TABLE personita(
    id int primary key auto_increment,
    nombre varchar(30),
    apellido varchar(30), 
    telefono int,
    email varchar(255)
);

CREATE TABLE usuario(
    id int primary key auto_increment,
    username varchar(50) unique,
    password varchar(255)
);

INSERT INTO usuario(username,password) VALUES('josesito','$2y$10$bsUBsEC4yMkjAJqW0olEL.eJiljefJ2HOXQVWN.Bs1oYVJLAK.aLG');
