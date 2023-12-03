<html>
<body>
<table cellpadding="2" cellspacing="6">
    <form action="insertar_pers.php?ver=1" method="post">
        <td><label>Id Empleado:</label></td><td><input type="text" name="id"></td>
        <tr><td><label>Correo:</label></td><td><input type="text" name="email"></td></tr>
        <tr><td><label>contraseña:</label></td><td><input type="text" name="password"></td></tr>
        <tr><td><label>Nombres:</label></td><td><input type="text" name="first_name"></td></tr>
        <tr><td><label>Apellido:</label></td><td><input type="text" name="last_name"></td></tr>
        <tr><td><label>Telefono:</label></td><td><input type="text" name="mobile"></td></tr>
        <tr><td><label>Direccion:</label></td><td><input type="text" name="address"></td></tr>
        <tr></tr>
        <tr><td colspan="2"><input type="submit" value="Enviar"></td></tr>
</form>
</table>

<?php
if(!empty($_GET['ver']))
    {
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $basededatos = "rendcuentas";

        //Primero se conecta al servidor
        $conexion = mysqli_connect($servidor, $usuario, $contraseña) or
        die ("No se ha podido conectar al servidor de Base de datos");
        mysqli_query($conexion, "SET NAMES UTF8");
        $db = mysqli_select_db($conexion, $basededatos) or
        die ("UPS! Pues va a ser que no se ha podido conectar a la base de datos");

        $consulta = "INSERT INTO factura_usuarios (id,email,password,first_name, last_name, mobile,address)
        values ('".$_POST['id']."','".$_POST['email']."','".
        $_POST['password']."','".$_POST['first_name']."','".$_POST['last_name']."','".
        $_POST['mobile']."','".$_POST['address']."')";
        print $consulta;
        $resultado = mysqli_query($conexion, $consulta) or die ("No se ha podido realizar la consulta");
    ?>
    <br>
    <br>
    <?php isset($_POST['id']) ? print $_POST['first_name'] : ""; ?><br>
    ¡Guardado con exito.!

    <?php
    }
    ?>
    </body>
    </html>


