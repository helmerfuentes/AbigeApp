# Host: localhost  (Version 5.5.5-10.1.31-MariaDB)
# Date: 2019-03-08 12:35:45
# Generator: MySQL-Front 6.0  (Build 4.0)


#
# Procedure "actualizarDispositivo"
#

DROP PROCEDURE IF EXISTS `actualizarDispositivo`;
CREATE PROCEDURE `actualizarDispositivo`(
        IN xidDispositivo VARCHAR(20),
        IN xidPerimetro INTEGER(11),
        IN xestado VARCHAR(10),
        IN xidAnimal VARCHAR(50),
        IN xbateria DECIMAL(2,2),
        IN xfecha DATETIME
    )
BEGIN
update dispositivos set idperimetro =xidPerimetro ,estado=xestado ,idanimal=xidAnimal
,bateria=xbateria,fecha = xfecha where iddispositivo = xidDispoitivio;
END;
