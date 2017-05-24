<!doctype html>
<html lang="es">
	<head>
		<title>Impresi&oacute;n 3D - Instituto Tecnologico de Tijuana</title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link href='//fonts.googleapis.com/css?family=Roboto' rel='stylesheet2'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div id="general">
			<?php
			session_start();
			$username = $_SESSION['username'];
			?>
			<div id="info">
				 <div id="user">
				 <i class="fa fa-user fa-fw" style="font-size:100px;color:white;"></i>
				 <p><?php echo $username;?><br /></p>
				 <h5><a href="logout.php">Cerrar Sesion</a></h5>
				 </div>
			 	 	   <br />
					   Consideraciones al subir tus archivos:
					   <br>
				  		<ul>
				  		<li>Maneja un nombre sencillo y consciso</li>
				  		<li>Descripcion breve</li>
						<li>Si te encuentras asociado a un proyecto ingresa la llave para dar prioridad a tus impresiones</li>
						<li>Puedes subir multiples archivos a la vez</i>
						</ul>
					 
			</div>
			<div id="header">
			 	  <center>
				  		  <br />
				  		  <h2>
			 			  	  Instituto Tecnol&oacute;gico de Tijuana
			 	  		  </h2>
						  <h1>Servicio de Impresi&oacute;n 3D</h1>
				  </center>
			</div>
			<div id="body">
			 	
				<div id="formulario">
					<form action="upload.php" method="post" enctype="multipart/form-data">
						<br>
						Nombre de Archivo: <input type="text" name="name" value="" required><br><br></left>
						Descripci&oacute;n:<input type="text" name="description" value="" required><br><br />
						&iquest;Estas asociado a un proyecto? <br />Ingresa tu llave: 
						<input type="text" name="key" value=""><br><br>
    					Seleccione el archivo a subir:<br><br>
    					<input type="file" class="imputs" name="upload[]" id="upload" multiple>
    					<br><center><input type="submit" class="inputs" value="Subir archivo" name="submit"></center>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>