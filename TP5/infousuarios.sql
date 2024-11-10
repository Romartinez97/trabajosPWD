-- Creo la base de datos
CREATE DATABASE infousuarios;

-- Comando para realizar los siguientes comandos dentro de la base de datos
USE infousuarios;

-- Creo la tabla usuario
CREATE TABLE usuario(
    `idusuario` bigint(20) AUTO_INCREMENT,
    `usnombre` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
    `uspass` int(11) NOT NULL,
    `usmail` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
    `usdeshabilitado` timestamp NOT NULL,
    PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcar la base de datos para la tabla `usuario`
INSERT INTO `usuario`(`usnombre`, `uspass`, `usmail`, `usdeshabilitado`) VALUES
('Juan Perez', 123456, 'juan.perez@example.com', '2024-01-01 00:00:00'),
('Maria Lopez', 789012, 'maria.lopez@example.com', '2024-01-01 00:00:00'),
('Carlos García', 345678, 'carlos.garcia@example.com', '2024-01-01 00:00:00'),
('Ana Torres', 901234, 'ana.torres@example.com', '2024-01-01 00:00:00'),
('Luis Hernandez', 567890, 'luis.hernandez@example.com', '2024-01-01 00:00:00'),
('Sofia Castillo', 234567, 'sofia.castillo@example.com', '2024-01-01 00:00:00');

----------------------------------------------------------

-- Creo la tabla rol
CREATE TABLE rol(
    `idrol` bigint(20) AUTO_INCREMENT,
    `roldescripcion` varchar (50) character set utf8 collate utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcar la base de datos para la tabla `rol`
INSERT INTO `rol`(`roldescripcion`) VALUES
('Administrador'),
('Usuario'),
('Invitado');

----------------------------------------------------------

-- Creo la tabla usuario_rol
CREATE TABLE usuario_rol(
    `idusuario` bigint(20) NOT NULL,
    `idrol` bigint(20) NOT NULL,
    PRIMARY KEY (`idusuario`, `idrol`),
    FOREIGN KEY (`idusuario`) REFERENCES usuario(`idusuario`) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (`idrol`) REFERENCES rol(`idrol`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcar la base de datos para la tabla `usuario_rol`
INSERT INTO `usuario_rol`(`idusuario`, `idrol`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 3);

----------------------------------------------------------
-- Borrar la base de datos (SOLO SI ES NECESARIO)
DROP DATABASE infousuarios;