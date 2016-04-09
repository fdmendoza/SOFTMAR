<?php 
#-> Class: Gestion_contactos
#->Method(s), Create (), ReadAll(),ReadbyID(),ReadbyName(),Update(),Delete()
#->Author: @Andrea_Guzman
#->Date Create
#->Last Update
#->Date Update

class Gestion_Empresa{
	//Metodo create()
	//El metodo create guarda los datos en la tabla contactos, captura todos los parametros desde el  formulario

	function Create($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$Ciudad,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Foto1,$Foto2,$Foto3,$Foto4,$Logo){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$Hor_desde=time("h:i:sa");
		$Hor_hasta=time("h:i:sa");
		//Crear el query que vamos a realizar
		$consulta = "INSERT INTO empresa (Cod_TipEmp,Nombre,Telefono,Direccion,Ciudad,NIT,Correo,Geo_x,Geo_y,Informacion,Dias_aten,Foto1,Foto2,Foto3,Foto4,Logo,Hor_desde,Hor_hasta) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$Ciudad,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Foto1,$Foto2,$Foto3,$Foto4,$Logo,$Hor_desde,$Hor_hasta));

		Softmar_BD::Disconnect();
	}
	//Metodo ReadAll()
	//Busca todos los registros de la tabla

	function ReadAll(){

		//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "SELECT * FROM empresa ORDER BY Nombre";

		$query = $Conexion->prepare($consulta);
		$query->execute();

		//Devolvemos el resultado en un arreglo
		//Fetch: es el resultado que arroja la consulta en forma de un vector o matriz segun sea el caso
		//Para consultar donde arroja mas de un dato el fatch debe ir acompañado con la palabra ALL

		$resultado = $query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;

		Softmar_BD::Disconnect();
	}
 
	function Update($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$Ciudad,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Foto1,$Foto2,$Foto3,$Foto4,$Logo){
	//Instanciamos y nos conectamos a la bd
		$Conexion = Softmar_BD::Connect();
		$Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		

		//Crear el query que vamos a realizar
		$consulta = "UPDATE empresa SET Nombre = ?,Telefono = ?,Direccion = ?,Ciudad = ?,NIT = ?,Correo= ?,Geo_x = ?,Geo_y= ?,Informacion =?,Dias_aten =?,Foto1 =?,Foto2=?,Foto3=?,Foto4=?,Logo=?,Hor_desde = ?,Hor_hasta = ? WHERE Cod_TipEmp = ?" ;

		$query = $Conexion->prepare($consulta);
		$query->execute(array($Cod_TipEmp,$Nombre,$Telefono,$Direccion,$Ciudad,$NIT,$Correo,$Geo_x,$Geo_y,$Informacion,$Dias_aten,$Foto1,$Foto2,$Foto3,$Foto4,$Logo));		

		Softmar_BD::Disconnect();
	
	}
}

?>