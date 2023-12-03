<html>
<body>
<table cellpadding="2" cellspacing="6">
    <form action="insertar_tipd.php?ver=1" method="post">
        <td><label>Id Empleado:</label></td><td><input type="text" name="id"></td>
        <tr><td><label>Tipo de Documento:</label></td><td><input type="text" name="tipoDoc"></td></tr>
        <tr><td><label>Número de Documento:</label></td><td><input type="text" name="numDoc"></td></tr>
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

        $consulta = "INSERT INTO tipodoc (id, tipoDoc, numDoc)
        values ('".$_POST['id']."',
        '".$_POST['tipoDoc']."',
        '".$_POST['numDoc']."')";
        print $consulta;
        $resultado = mysqli_query($conexion, $consulta) or die ("No se ha podido realizar la consulta");
    ?>
    <br>
    <br>
    <?php isset($_POST['id']) ? print $_POST['tipoDoc'] : ""; ?><br>
    ¡Guardado con exito.!

    <?php
    }
    ?>
    </body>
    </html>


