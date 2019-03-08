# Host: localhost  (Version 5.5.5-10.1.31-MariaDB)
# Date: 2019-03-08 12:35:17
# Generator: MySQL-Front 6.0  (Build 4.0)


#
# Procedure "infoDispositivo"
#

DROP PROCEDURE IF EXISTS `infoDispositivo`;
CREATE PROCEDURE `infoDispositivo`(idDispositivo varchar(20))
begin
select fi.nombreFinca,fi.ubicacion, fi.idmunicipio,per.tipo,dis.iddispositivo,dis.estado as estadodispositivo,dis.idanimal, dis.bateria,po.estado as posicionestado, po.bateria as bateriaposicion, ma.fecha from fincas fi
left join perimetros per
on fi.idfinca=per.idfinca
left join dispositivos dis
on dis.idperimetro=per.idperimetro
left join posicion po
on dis.iddispositivo=po.iddispositivo
left join mantenimiento ma
on ma.iddispositivo=dis.iddispositivo
where dis.iddispositivo=idDispositivo;
end;
