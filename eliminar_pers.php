<?php
$usuario="root";
$contrasena="";
$servidor="localhost";
$basededatos ="rendcuentas";

//Primero se conecta al servidor

$conexion = mysqli_connect($servidor,$usuario,$contrasena) or die ("No se ha podido conectar al servidor de base de datos");
mysqli_query($conexion,"SET NAMES UTF8");
$db= mysqli_select_db($conexion, $basededatos) or die ("Upps! Pues va a ser que no se ha podido conectar a la base datos  ");

$consulta = "DELETE FROM factura_usuarios WHERE id = ".$_GET['id'];

$resultado = mysqli_query($conexion, $consulta) or die ("No se ha podido realizar la eliminación del registro.!!"); ?>
<table align = "center" border=2 cellpading=2 cellspacing=20 BORDERCOLOR=lightblue>
<tr>
    <td>El registro fue eliminado</td>
</tr>
<tr>
    <td align="center"><a href="conexion_pers.php">Volver</a></td>
</tr>
</table>
<?php
mysqli_close($conexion);