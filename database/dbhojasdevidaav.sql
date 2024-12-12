SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `roles` (
    `id_rol` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(50) NOT NULL
);

INSERT INTO `roles` (`id_rol`, `nombre`) VALUES (1, 'Administrador') ;
INSERT INTO `roles` (`id_rol`, `nombre`) VALUES (2, 'Editor') ;


CREATE TABLE `usuarios` (
    `id_usuario` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(50) NOT NULL,
    `usuario` VARCHAR(25) NOT NULL,
    `contrasena` VARCHAR(255) NOT NULL,
    `id_rol` INT(10) NOT NULL,

    FOREIGN KEY (id_rol) REFERENCES roles(id_rol) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `contrasena`, `id_rol`) VALUES (1, 'Juan Diego Higinio Aranzazu', 'juanhiginio', 'juandiegohiginio123', 1);
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `contrasena`, `id_rol`) VALUES (2, 'Juan Camilo Bueno Villada', 'juanCamiloB', '321', 2);



CREATE TABLE `tipos` (
    `id_tipo` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tipo` VARCHAR(25) NOT NULL
);

INSERT INTO `tipos` (`id_tipo`, `tipo`) VALUES (1, 'Preventivo');
INSERT INTO `tipos` (`id_tipo`, `tipo`) VALUES (2, 'Correctivo');


CREATE TABLE `responsables` (
    `id_responsable` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(50) NOT NULL,
    `cargo` VARCHAR(25) NOT NULL
);

INSERT INTO `responsables` (`id_responsable`, `nombre`, `cargo`) VALUES (1, 'Juan Higinio', 'Aprendiz');
INSERT INTO `responsables` (`id_responsable`, `nombre`, `cargo`) VALUES (2, 'Juan Carlos Rendon', 'Tecnólogo TI');



CREATE TABLE `mantenimientos` (
    `id_mantenimiento` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `ejecutor` VARCHAR(50) NOT NULL,
    `fecha` VARCHAR(25) NOT NULL,
    `problema` VARCHAR(1000),
    `diagnostico` VARCHAR(1000),
    `solucion` VARCHAR(1000),
    `observaciones` VARCHAR(3000),
    `serial` VARCHAR(25) NOT NULL,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    `id_tipo` INT(10) NOT NULL,
    `id_responsable` INT(10) NOT NULL,

    FOREIGN KEY (id_tipo) REFERENCES tipos(id_tipo) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_responsable) REFERENCES responsables(id_responsable) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `mantenimientos` (`id_mantenimiento`, `ejecutor`, `fecha`, `problema`, `diagnostico`, `solucion`, `observaciones`, `serial`, `timestamp`, `id_tipo`, `id_responsable`) VALUES (1, 'Juan Diego Higinio Aranzazu', '01 Enero 2025', 'Equipo demasiado lento', 'El equipo tiene disco duro mecanico', 'Se hace reemplazo del disco por uno de estado solido', 'El equipo queda trabajando de manera rápida y eficiente', '123Serial', '2024-12-02 15:45:00', 2, 1);

INSERT INTO `mantenimientos` (`id_mantenimiento`, `ejecutor`, `fecha`, `problema`, `diagnostico`, `solucion`, `observaciones`, `serial`, `timestamp`, `id_tipo`, `id_responsable`) VALUES (2, 'Juan Rendon', '08 Junio 2024', NULL, NULL, NULL, 'El equipo queda trabajando de manera rápida y eficiente', '123Serial', '2024-12-02 15:45:00', 1, 2);
