<ul class="nav navbar-nav">
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Cuentas
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="invoice_list.php">Lista de Cuenta</a></li>
		<li><a href="create_invoice.php">Crear Cuenta Rendir</a></li>				  
	</ul>
</li>
<?php 
if($_SESSION['userid']) { ?>
	<li class="dropdown">
		<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Conectado: <?php echo $_SESSION['user']; ?>
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="#">Mi Cuenta</a></li>
			<li><a href="login.php">Salir</a></li>		  
		</ul>
	</li>
<?php } ?>
</ul>
<br /><br /><br /><br />