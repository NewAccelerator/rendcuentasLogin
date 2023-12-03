<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Personal</title>
    <link rel="stylesheet" href="stylealumnos.css">
    <?php
        $usuario = "root";
        $contrasena = "";  
        $servidor = "localhost";
        $basededatos = "rendcuentas";

        $conexion = mysqli_connect( $servidor, $usuario, $contrasena) or die ("No se ha podido conectar al servidor de Base de datos");
        mysqli_query($conexion,"SET NAMES utf8");
        $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    ?>
</head>

<body>
	<div id="container">
		<header>
			<h1>Mantenimiento de la tabla Tipo De Documento</h1>
			<nav>
				<!--  ul>li*4>a  -->
				<ul>
					<li><a href="Login.php">Login</a></li><!--
					--><li><a href="Alumnos.php">personas</a></li><!--
					--><li><a href="TipDoc.php">Tipo Documento</a></li><!--
					--><li><a href="invoice_list.php">Rendir Cuentas</a></li><!--
					--><
				</ul>
			</nav>
		</header>
		
		<section>
			<h1>Formulario Mantenimiento</h1>
			<p id="pnosotros">Este formmulario esta orientado a presentar los datos del tipo de documento el cual registran los personales y con ello la posibilidad de acceder a los mismos para actualización, consulta y/o eliminación</p>
			<div id="contenido">
                <div id="contenido1" class="contiene">
	                <h2>Muestra tipo de documento  del personal</h2>
                    <?php
                        $consulta = "SELECT * FROM tipodoc";

                        $resultado = mysqli_query( $conexion, $consulta ) or die ("No se ha podido realizar la consulta");
                        $resultado = mysqli_query($conexion,$consulta) or die ("No se a podido relaizar la consulta");
                        echo "<table border=10 cellpading=2 height=100 cellspacing=5 BORDERCOLOR=green>";
                        echo "<tr>";
                        echo "<td valign='middle' align='center'>IdEmpl</td><td valing='middle' align='center'>Tipo de Documento</td>";
                        echo "<td valign='middle' align='center'>Número de Documento</td>";
                        echo "</tr>";
                        
                        while ($columna = mysqli_fetch_array( $resultado ))
                        {
                            echo "<tr>";
                            echo "<td>" . $columna['id'] . "</td><td>" . $columna['tipoDoc'] . "</td>";
                            echo "<td>" . $columna['numDoc'] . "</td>";

                            echo "<td><a href='detalle_pers.php?id=".$columna['id']."'>Ver Detalle</a></td>";
                            echo "<td><a href='actualizar_tipd.php?id=".$columna['id']."'>Actualizar</a></td>";
                            echo "<td><a href='eliminar_tipd.php?id=".$columna['id']."'>Eliminar</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    ?>
                </div>
                <div id="contenido2" class="contiene">
                	<h2>Insertar tipo documento de Empleados</h2>

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
                    //if(!empty($_GET['actualizar']))
                    //{
                    //$update = "UPDATE personal SET  nombres='".$_POST['nombres']."',
                    //                                apePat='".$_POST['apePat']."',
                    //                                apeMat='".$_POST['apeMat']."',
                    //                                importe='".$_POST['importe']."',
                    //                                telefono='".$_POST['telefono']."',
                    //                               correo='".$_POST['correo']."'
                    //                                WHERE idEmp = '".$_POST['idEmp']."'";
                    //print $update;
                    //$resultado = mysqli_query( $conexion, $update ) or die ("No se ha podido realizar la consulta");
                    //}
                    
                    //$consulta = "SELECT * FROM personal WHERE idEmp ='".$_GET['idEmp']."'";
                    //$resultado = mysqli_query($conexion, $consulta ) or
                    //die ("No se ha podido realizar la consulta");
                    //$row = mysqli_fetch_array( $resultado);
                    ?>
                    
                           <!--  <table cellpadding="3" cellspacing="8">
                                <form action="actualizar.php?idEmp=<?php echo $_GET['id'];?>&actualizar=1" 
                                 method="post">
                    
                                 <tr>
                                     <td><label>Nombre(s):</label></td><td> <input type="text" 
                                     name="nombres" value="<?php echo $row['nombres'];?>"></td>
                                 </tr>
                    
                                 <tr>
                                     <td><label>Apellido Paterno:</label></td><td><input type="text" 
                                     name="apePat" value="<?php echo $row['apePat'];?>"></td>
                                 </tr>
                    
                                 <tr>
                                     <td><label>Apellido Materno:</label></td><td><input type="text" 
                                     name="apeMat" value="<?php echo $row['apeMat'];?>"></td>
                                 </tr>
                    
                                 <tr>
                                     <td><label>Importe de dinero:</label></td><td> <input type="text" 
                                     name="importe" value="<?php echo $row['importe'];?>"></td>
                                 </tr>
                                 <tr>
                                     <td><label>Numero de telefono:</label></td><td> <input type="text" 
                                     name="telefono" value="<?php echo $row['telefono'];?>"></td>
                                 </tr>
                                 <tr>
                                     <td><label>Correo electronico:</label></td><td> <input type="text" 
                                     name="correo" value="<?php echo $row['correo'];?>"></td>
                                 </tr>
                                 <tr>
                                     <input type="hidden" name="idEmp" value="<?php echo $row['idEmp'];?>">
                                     <td colspan="2"><input type="submit" value="Enviar"></td>
                                 </tr>
                        </form>
                    </table> -->
                </div>
            </div>
		</section>
		
		<footer>
			<h6>Todos los derechos reservados</h6>
		</footer>
	</div>
</body>
</html>
