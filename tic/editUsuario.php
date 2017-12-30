<?php
	require_once("funcionesGraficas.php");
	require_once("functionDB.php");

	$id = $_GET['id'];

	$usuarios = selectUsuario($id);
	$user = $usuarios[0];

	$nombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : $user['nombre'];
	$apellido = isset($_POST['txtApellido']) ? $_POST['txtApellido'] : $user['apellido'];
	$genero = isset($_POST['rdSexo']) ? $_POST['rdSexo'] : $user['sexo'];
	$desc = isset($_POST['txtDescr']) ? $_POST['txtDescr'] : $user['Bio'];
	$foto = isset($_FILES['img']) ? 1 : 0;

	$errores = [];

	if ($_POST){
		if (strlen($nombre) > 0 && strlen($apellido) > 0 && strlen($desc) > 0){
			editarUsuario($user['idUsuarios'], $user['user'], $user['pass'], $nombre, $apellido, $user['mail'], $foto, $user['birthday'], $genero, $desc);
		} else {
			$errores['datos'] = "Complete todos los datos";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
		<?php headerHTML("Editar Perfil"); ?>
  </head>
  <body>

		<?php aperturaHTML(); ?>

	    <div class="container">
	      <h1>Editar perfil</h1>

	    	<?php if(count($errores) > 0) { ?>
				<div class="alert alert-danger" role="alert">
					<?php foreach($errores as $error)
					{
						echo $error . "<br/>";
					} ?>
				</div>
	  		<?php } ?>
			<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="txtNombre" value="<?php echo $nombre ?>" id="nombre"> <br>
						<label for="apellido">Apellido</label>
						<input type="text" class="form-control" name="txtApellido" value="<?php echo $apellido ?>" id="apellido"> <br>
						<b>Subir una imagen</b><input type="file" name="img" value="" /><br>
						<b>Sexo</b>: <br>
						<input type="radio" name="rdSexo" <?php if ($genero == 0){echo 'checked="checked"';}?> value="0"><i>Masculino</i>
						<input type="radio" name="rdSexo" <?php if ($genero == 1){echo 'checked="checked"';}?> value="1"><i>Femenino</i> <br><br>
						<label for="descr">Descripción</label>
						<textarea rows="8" cols="65" maxlength="254" style="width:100%;resize:none;display: block;margin-left: auto;margin-right: auto;" name="txtDescr" id="descr"><?php echo htmlspecialchars($desc); ?></textarea>
					</div>
					<button type="submit" class="btn btn-default">Guardar</button> <br> <br>
			</form>
		</div>
	</body>
</html>