CREATE TABLE `data_global` 
(`id` INT(11) NOT NULL AUTO_INCREMENT , 
`usuario_id` INT(11) NOT NULL , 
`num_personas` INT(11) NOT NULL DEFAULT '0' , 
`num_personas_capacitadas` INT(11) NOT NULL DEFAULT '0' , 
`num_proy_totales` INT(11) NULL DEFAULT '0' , 
`num_proy_convertidos` INT(11) NOT NULL DEFAULT '0' , 
`e_personas_capacitadas` VARCHAR(3) NULL DEFAULT NULL , 
`e_sesiones_realizadas` VARCHAR(3) NULL DEFAULT NULL , 
`e_prototipos` VARCHAR(3) NULL DEFAULT NULL , 
`p_participacion` VARCHAR(3) NULL DEFAULT NULL , 
`p_ideas_aprob` VARCHAR(3) NULL DEFAULT NULL , 
`p_implementacion` VARCHAR(3) NULL DEFAULT NULL , 
`s_nuevos_prod` VARCHAR(3) NULL DEFAULT NULL , 
`s_nuevos_servicios` VARCHAR(3) NULL DEFAULT NULL , 
`s_proyectos_exitosos` VARCHAR(3) NULL DEFAULT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `equipos` 
(`id` INT(11) NOT NULL AUTO_INCREMENT , 
`id_usuario` INT(11) NOT NULL , 
`id_proyecto` INT(11) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `proyecto` 
(`id` INT(11) NOT NULL AUTO_INCREMENT , 
`nombre` VARCHAR(30) NULL DEFAULT NULL , 
`fecha_inicio` DATE NULL DEFAULT NULL , 
`descripcion` VARCHAR(300) NULL DEFAULT NULL , 
`presupuesto_inicial` INT(11) NULL DEFAULT NULL , 
`duracion_meses` INT(2) NULL DEFAULT NULL , 
`estado` VARCHAR(1) NULL DEFAULT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `usuarios` 
(`id` INT(11) NOT NULL AUTO_INCREMENT , 
`correo` VARCHAR(40) NOT NULL , 
`clave` VARCHAR(40) NOT NULL , 
`nombre` VARCHAR(50) NULL DEFAULT NULL , 
`empresa` VARCHAR(50) NULL DEFAULT NULL , 
`rol` VARCHAR(20) NULL DEFAULT NULL , 
`induccion` INT(1) NOT NULL DEFAULT '0' , 
`induccion_global` INT(1) NOT NULL DEFAULT '0' , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `usuarios` ADD `creacion` DATE NULL DEFAULT NULL AFTER `nombre`;
ALTER TABLE `proyecto` ADD `progreso` INT NOT NULL DEFAULT '3' AFTER `estado`;

CREATE TABLE `data_presupuesto` 
( `id` INT NOT NULL AUTO_INCREMENT , 
`director` INT NOT NULL , 
`presupuesto_gen` BIGINT(17) NOT NULL , 
`fecha_inicio` DATE NOT NULL , 
`periodo` VARCHAR(15) NOT NULL DEFAULT 'Trimestral' , 
`presupuesto_act` BIGINT(17) NOT NULL DEFAULT '0', 
`papeleria` VARCHAR(5) NOT NULL DEFAULT 'false' , 
`capacitaciones` VARCHAR(5) NOT NULL DEFAULT 'false' , 
`infraestructura` VARCHAR(5) NOT NULL DEFAULT 'false' , 
`salario` VARCHAR(5) NOT NULL DEFAULT 'false' ,
`licencias` VARCHAR(5) NOT NULL DEFAULT 'false' , 
`mobiliario` VARCHAR(5) NOT NULL DEFAULT 'false' , 
`experimentacion` VARCHAR(5) NOT NULL DEFAULT 'false' , 
`materiales` VARCHAR(5) NOT NULL DEFAULT 'false' , 
`desarrollo` VARCHAR(5) NOT NULL DEFAULT 'false' , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `usuarios` ADD 
`induccion_personas` INT NOT NULL DEFAULT '0' AFTER `induccion_global`, 
ADD `induccion_presupuesto` INT NOT NULL DEFAULT '0' AFTER `induccion_personas`;