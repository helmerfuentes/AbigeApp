CREATE DEFINER=`root`@`localhost` PROCEDURE `detalle_finca`(
	IN `vid` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT ''
BEGIN
	SELECT usuarios.imagen AS imagen, usuarios.nombres AS u_nombre, usuarios.primerApellido AS u_apellido, departamentos.DESCRIPCION AS d_descripcion, municipios.descripcion AS m_descripcion, fincas.estado as estado, fincas.nombreFinca AS nombre FROM usuarios RIGHT JOIN fincas ON usuarios.idfinca = fincas.idfinca AND usuarios.rol = 'DUEÑO' JOIN municipios ON fincas.idmunicipio = municipios.idmunicipio JOIN departamentos ON departamentos.COD_DPTO = municipios.iddpto WHERE fincas.idfinca = vid;
END