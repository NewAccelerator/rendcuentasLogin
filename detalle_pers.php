<?php
if(!empty($_GET['id'])){
	$usuario = "root";
	$contrasena = "";  
	$servidor = "localhost";
	$basededatos = "rendcuentas";

	$conexion = mysqli_connect( $servidor, $usuario, $contrasena ) or die ("No se ha podido conectar al servidor de Base de datos");
	mysqli_query($conexion,"SET NAMES utf8");
	$db = mysqli_select_db( $conexion, $basededatos ) or die ("Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	
	$consulta = "SELECT * FROM factura_usuarios where id='".$_GET['id']."'";
	//$consulta = "SELECT * FROM alumnos ";
	$resultado = mysqli_query( $conexion, $consulta ) or die ("No se ha podido realizar la consulta");
	echo "<table border=15  cellpadding=2 cellspacing=12 BORDERCOLOR=blue>";
	echo "<tr>";
		echo "<td>id</td><td>email</td>";
		echo "<td>password</td><td>first_name</td>";
		echo "<td>last_name</td><td>mobile</td>";
		echo "<td>addres</td>";
		echo "</tr>";
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
        echo "<td>" . $columna['id'] . "</td><td>" . $columna['email'] . "</td>";
        echo "<td>" . $columna['password'] . "</td><td>" . $columna['first_name'] . "</td>";
        echo "<td>" . $columna['last_name'] . "</td><th>" . $columna['mobile'] . "</td>";
        echo "<th>" . $columna['address'] . "</td>";

		echo "<td></td><td><a href='Alumnos.php'>Volver..</a></td>";
		echo "</tr>";
	}
	echo "</table>";
} else{
	echo "Debe enviar el número de id";
}
//$_GET  -> A TRAVES DEL NAVEGADOR : BUSCADOR
//$_POST _> VIAJAN DE FORMA OCULTA
?>