<?php session_start();
// Define la función cerrar. La inicia.
if(isset($_GET['cerrar']) && !empty($_GET['cerrar'])){
	unset($_SESSION);
	session_destroy();
}
$msgError = '';

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
{
	$usuario = "root";
    $contrasena = "";  
    $servidor = "localhost";
    $basededatos = "rendcuentas";

	//Primero se conecta al servidor
	$conexion = mysqli_connect( $servidor, $usuario, $contrasena ) or die ("No se ha podido conectar al servidor de Base de datos");
    mysqli_query($conexion,"SET NAMES utf8");
    $db = mysqli_select_db( $conexion, $basededatos ) or die ("Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

	$consulta = "select password,first_name,email FROM factura_usuarios WHERE email = '".$_POST['email']."' and password = '".$_POST['password']."'";

	$resultado = mysqli_query( $conexion, $consulta ) or die ("No se ha podido realizar la consulta");
	
	if(mysqli_num_rows($resultado) > 0){
		$columna = mysqli_fetch_array( $resultado );
		$_SESSION['email'] = $columna['email'];
		$_SESSION['first_name'] = $columna['first_name'];
		//var_dump($_SESSION);
		//exit("aqui termine");
	} else {
		$msgError = "No es ni correo, ni contraseña";
	}
}
?>

<html>
	<head>
		<title>sistema de login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- vinculo a bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Temas-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->  
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<script>
			function cerrar(){
				return confirm("Esta seguro de cerrar sesion?") ?  true : false;
			}
		</script>
	</head>

	<body>
		<div id="Contenedor">
		<div class="Icon">
			<!--Icono de usuario-->
			<span class="glyphicon glyphicon-user"></span>
		</div>
		<div class="ContentForm">
			<?php 
			// En php consulta si la sesión esta abierta
			if(empty($_SESSION['email']) && empty($_SESSION['password'])){
			?>
		 	<form action="?" method="post" name="FormEntrar">
		 		<!--Cuadro de texto para ingreso de correo-->
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="email" class="form-control" name="email" placeholder="email" id="email" aria-describedby="sizing-addon1" required>
				</div>
				<br>
				<!--Cuadro de texto para ingreso de contraseña-->
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" name="password" class="form-control" placeholder="*******" aria-describedby="sizing-addon1" required>
				</div>
				<br>
				<!--Botón entrar-->
				<button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit">Entrar</button>
				<!--Rótulo olvidaste tu contraseña-->
				<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>
				<div class="opcioncontra"><a href=""><?php if (!empty($msgError)){echo $msgError;} ?></a></div>
		 	</form>
			<?php
			} else {
			?>
				Bienvenido, <?php echo $_SESSION['first_name'] ?> <br>
				Tu correo es <?php echo $_SESSION['email'] ?> <br>
		
				<a  href="alumnos.php">Ver datos de Personal</a> | <a onclick="return cerrar();" href="login.php?cerrar=1">Cerrar Sesion</a>
			<?php
			}
			?>
		 </div>	
		 </div>
		 <div>
			<?php // &&, ||, !, AND, OR, XOR
			/*if(!empty($_POST['correo']) && !empty($_POST['contra'])){
				$_SESSION['correo'] = $_POST['correo'];
				$_SESSION['contra'] = $_POST['contra'];
			}*/
			?>
		 </div>
	</body>

	 <!-- vinculando a libreria Jquery-->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	 <!-- Libreria java scritp de bootstrap -->
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>