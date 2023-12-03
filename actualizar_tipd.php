<?php

$usuario = "root";
$contrasena = "";
$servidor = "localhost";
$basededatos = "rendcuentas";

//primero se conecta al servidor
$conexion = mysqli_connect($servidor, $usuario, $contrasena) or die ("No se ha podido conectar al servidor de Base de datos");
mysqli_query($conexion, "SET NAMES utf8");
$db =mysqli_select_db($conexion, $basededatos) or die ("Upps! Pues va a ser que no se ha podido conectar al servidor de Base de datos");

if(!empty($_GET['actualizar_tipd']))
{
$update = "UPDATE tipodoc SET tipoDoc='".$_POST['tipoDoc']."',
                              numDoc='".$_POST['numDoc']."'
                             WHERE id = '".$_POST['id']."'";
print $update;
$resultado = mysqli_query( $conexion, $update ) or die ("No se ha podido realizar la consulta");
}

$consulta = "SELECT * FROM tipodoc WHERE id ='".$_GET['id']."'";
$resultado = mysqli_query($conexion, $consulta ) or
die ("No se ha podido realizar la consulta");
$row = mysqli_fetch_array( $resultado);
?>

<html>
    <body>
        <table cellpadding="3" cellspacing="8">
            <form action="actualizar_tipd.php?id=<?php echo $_GET['id'];?>&actualizar_tipd=1" 
             method="post">

             <tr>
                 <td><label>Tipo de Documento:</label></td><td><input type="text" 
                 name="tipoDoc" value="<?php echo $row['tipoDoc'];?>"></td>
             </tr>

             <tr>
                 <td><label>Número de Documento:</label></td><td><input type="text" 
                 name="numDoc" value="<?php echo $row['numDoc'];?>"></td>
             </tr>

             <tr>
                 <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                 <td colspan="2"><input type="submit" value="Enviar"></td>
             </tr>

            </form>
        </table>
    </body>
</html>
