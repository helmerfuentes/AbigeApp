# Host: localhost  (Version 5.5.5-10.1.31-MariaDB)
# Date: 2019-03-08 12:34:40
# Generator: MySQL-Front 6.0  (Build 4.0)


#
# Procedure "procedureDuvan"
#

DROP PROCEDURE IF EXISTS `procedureDuvan`;
CREATE PROCEDURE `procedureDuvan`()
begin
select usuarios.idusuario,fincas.idfinca,usuarios.imagen, fincas.nombreFinca as finca, 
count(distinct usuarios.idusuario)-1 as empleados, 
count(distinct dispositivos.iddispositivo) as dispositivos,
count(distinct perimetros.idperimetro) as perimetros,usuarios.rol,
 usuarios.nombres  duenio,
usuarios.identificacion as identduenio
from fincas left join usuarios
on fincas.idfinca = usuarios.idfinca
left join perimetros
on fincas.idfinca = perimetros.idfinca
left join dispositivos
on dispositivos.idperimetro = perimetros.idperimetro
group by fincas.idfinca having usuarios.rol='Dueño';
end;
