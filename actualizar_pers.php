<?php

$usuario = "root";
$contrasena = "";
$servidor = "localhost";
$basededatos = "rendcuentas";

//primero se conecta al servidor
$conexion = mysqli_connect($servidor, $usuario, $contrasena) or die ("No se ha podido conectar al servidor de Base de datos");
mysqli_query($conexion, "SET NAMES utf8");
$db =mysqli_select_db($conexion, $basededatos) or die ("Upps! Pues va a ser que no se ha podido conectar al servidor de Base de datos");

if(!empty($_GET['actualizar_pers']))
{
$update = "UPDATE factura_usuarios SET  email='".$_POST['email']."',
                                password='".$_POST['password']."',
                                first_name='".$_POST['first_name']."',
                                last_name='".$_POST['last_name']."',
                                mobile='".$_POST['mobile']."',
                                address='".$_POST['address']."'
                                WHERE id = '".$_POST['id']."'";
print $update;
$resultado = mysqli_query( $conexion, $update ) or die ("No se ha podido realizar la consulta");
}

$consulta = "SELECT * FROM factura_usuarios WHERE id ='".$_GET['id']."'";
$resultado = mysqli_query($conexion, $consulta ) or
die ("No se ha podido realizar la consulta");
$row = mysqli_fetch_array( $resultado);
?>

<html>
    <body>
        <table cellpadding="3" cellspacing="8">
            <form action="actualizar_pers.php?id=<?php echo $_GET['id'];?>&actualizar_pers=1" 
             method="post">

             <tr>
                 <td><label>Correo electronico:</label></td><td> <input type="text" 
                 name="email" value="<?php echo $row['email'];?>"></td>
             </tr>

             <tr>
                 <td><label>Contraseña:</label></td><td><input type="text" 
                 name="password" value="<?php echo $row['password'];?>"></td>
             </tr>

             <tr>
                 <td><label>Nombre(s):</label></td><td><input type="text" 
                 name="first_name" value="<?php echo $row['first_name'];?>"></td>
             </tr>

             <tr>
                 <td><label>Apellido(s):</label></td><td> <input type="text" 
                 name="last_name" value="<?php echo $row['last_name'];?>"></td>
             </tr>
             <tr>
                 <td><label>Numero de telefono:</label></td><td> <input type="text" 
                 name="mobile" value="<?php echo $row['mobile'];?>"></td>
             </tr>
             <tr>
                 <td><label>Direccion:</label></td><td> <input type="text" 
                 name="address" value="<?php echo $row['address'];?>"></td>
             </tr>
             <tr>
                 <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                 <td colspan="2"><input type="submit" value="Enviar"></td>
             </tr>

            </form>
        </table>
    </body>
</html>
