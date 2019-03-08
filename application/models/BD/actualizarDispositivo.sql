DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarOActulizarUsuario`(
        IN xid_finca INTEGER,
        IN xidentificacion VARCHAR(20),
        IN xnombres VARCHAR(30),
        IN xprimer_apellido VARCHAR(10),
        IN xsegundo_apellido VARCHAR(10),
        IN xrol VARCHAR(15),
        IN xemail VARCHAR(45),
        IN xtelefono VARCHAR(20),
        IN xclave VARCHAR(11),
        IN xdireccion VARCHAR(50),
        IN xestado VARCHAR(1)
    )
BEGIN
	DECLARE ENCONTRADO INT;
    SET ENCONTRADO = (SELECT COUNT(*) FROM USUARIOS WHERE IDENTIFICACION = XIDENTIFICACION);
    
    IF ENCONTRADO > 0 THEN
    	UPDATE USUARIOS U SET U.`clave` = XCLAVE, U.`direccion` = XDIRECCION, U.`email` = XEMAIL,
        	U.`estado` = XESTADO, U.`idfinca` = XID_FINCA, U.`nombres` = XNOMBRES,
            U.`primerApellido` = XPRIMER_APELLIDO, U.`segundoApellido` = XSEGUNDO_APELLIDO,
            U.`telefono` = XTELEFONO WHERE U.`identificacion` = XIDENTIFICACION;
    ELSE
    	INSERT INTO USUARIOS(IDFINCA,IDENTIFICACION,NOMBRES,PRIMERAPELLIDO,SEGUNDOAPELLIDO,ROL,CLAVE,DIRECCION,
        					 TELEFONO,EMAIL,ESTADO)
    	VALUES(XID_FINCA,XIDENTIFICACION,XNOMBRES,XPRIMER_APELLIDO,XSEGUNDO_APELLIDO,XROL,XCLAVE,XDIRECCION,
        	   XTELEFONO,XEMAIL,XESTADO);
    END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarPosicionDispositivo`()
BEGIN
	SELECT * FROM dispositivos D LEFT JOIN POSICION P ON D.`iddispositivo` = P.`iddispositivo`
    WHERE D.`estado` = "Activo" ORDER BY D.`iddispositivo` ASC;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrarPosicionActual`(
        IN xlatitud DECIMAL(15,10),
        IN xlongitud DECIMAL(15,10),
        IN xestadoDispositivo VARCHAR(7),
        IN xidDispositivo VARCHAR(20),
        IN xestadoBateria VARCHAR(10)
    )
begin
  declare duplicado int;
  set duplicado= (select count(*) from posicion where iddispositivo = xidDispositivo);
  if duplicado>0 then
    update posicion set latitud = xlatitud, longitud = xlongitud, 
      estado=xestadoDispositivo, bateria = xestadoBateria where iddispositivo = xidDispositivo;
    else
    INSERT INTO posicion ( latitud, longitud,estado,iddispositivo,bateria)
   VALUES (xlatitud, xlongitud,xestadoDispositivo,xidDispositivo,   xestadoBateria);
  end if;
  
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `procedureDuvan`()
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
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `infoDispositivo`(idDispositivo varchar(20))
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
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarDispositivo`(
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
END$$
DELIMITER ;
