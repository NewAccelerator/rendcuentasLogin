<?php
$usuario="root";
$contrasena="";
$servidor="localhost";
$basededatos ="rendcuentas";

//Primero se conecta al servidor

$conexion = mysqli_connect($servidor,$usuario,$contrasena) or die ("No se ha podido conectar al servidor de base de datos");
mysqli_query($conexion,"SET NAMES UTF8");
$db= mysqli_select_db($conexion, $basededatos) or die ("Upps! Pues va a ser que no se ha podido conectar a la base datos  ");

$consulta = "SELECT * FROM factura_usuarios";

$resultado = mysqli_query($conexion,$consulta) or die ("No se a podido relaizar la consulta");
echo "<table border=10 cellpading=2 height=100 cellspacing=5 BORDERCOLOR=green>";
echo "<tr>";
    echo "<td valign='middle' align='center'>IdEmpl</td><td valing='middle' align='center'>Correo</td>";
    echo "<td valign='middle' align='center'>Contraseña</td><td>Nombre</td>";
    echo "<td valign='middle' align='center'>Apellido</td><td valing='middle' align='center'>Telefono</td>";
    echo "<td valign='middle' align='center'>Direccion</td>";
    echo "</tr>";
while ($columna = mysqli_fetch_array($resultado))
{

    echo "<tr>";
    echo "<td>" . $columna['id'] . "</td><td>" . $columna['email'] . "</td>";
    echo "<td>" . $columna['password'] . "</td><td>" . $columna['first_name'] . "</td>";
    echo "<td>" . $columna['last_name'] . "</td><th>" . $columna['mobile'] . "</td>";
    echo "<th>" . $columna['address'] . "</td>";
    echo "</tr>";
}
echo "</table>";
