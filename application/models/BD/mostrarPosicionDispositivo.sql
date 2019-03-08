# Host: localhost  (Version 5.5.5-10.1.31-MariaDB)
# Date: 2019-03-08 12:35:31
# Generator: MySQL-Front 6.0  (Build 4.0)


#
# Procedure "mostrarPosicionDispositivo"
#

DROP PROCEDURE IF EXISTS `mostrarPosicionDispositivo`;
CREATE PROCEDURE `mostrarPosicionDispositivo`()
BEGIN
	SELECT * FROM dispositivos D LEFT JOIN POSICION P ON D.`iddispositivo` = P.`iddispositivo`
    WHERE D.`estado` = "Activo" ORDER BY D.`iddispositivo` ASC;
END;
