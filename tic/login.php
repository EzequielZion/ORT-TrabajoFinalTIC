<?php
  require_once("funcionesGraficas.php");
  require_once("functionDB.php");

$mail = isset($_POST['txtMail']) ? $_POST['txtMail'] : '';
$pass = isset($_POST['txtPass']) ? $_POST['txtPass'] : '';
$error = '';
if ($_POST){
  if (strlen($mail) == 0 || strlen($pass) == 0){
    $error = "Complete los campos.";
  } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    $error = "Ingrese un mail válido.";
  }
}

if (strlen($error) < 1){
  if (login($mail, $pass) >0){
    $usuarios = selectUsuariobyMail($mail);
    $usu = $usuarios[0];
    setcookie("logged",$usu['idUsuarios'],time()+(60*60*24*365),"/");
    header('Location: '."perfil.php?id=".$usu['idUsuarios']);

  }
   else{
    $error = "Credenciales erróneas.";
  }
}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
		<?php headerHTML("Iniciar sesión"); ?>
  </head>
  <body>

		<?php aperturaHTML(); ?>

    <div class="container">
      <h1>Iniciar sesión</h1>
      <?php  if (strlen($error) > 0){    ?>
      <div class="alert alert-danger" role="alert">
        <?php
        echo $error;
         ?>
      </div>
      <?php } ?>
      <form action="" method="POST">
        <div class="form-group">
          <div style="margin-left: 40%;">
            <label for="mail">E-Mail</label>
            <input style="width: 33%;" type="text" class="form-control" name="txtMail" value="<?php echo $mail; ?>" id="mail"> <br>
          </div>
          <div style="margin-left: 40%;">
            <label for="pass">Contraseña</label>
            <input style="width: 33%;" type="password" class="form-control" name="txtPass" value="" id="pass"> <br>
          </div>
          <div class="col-md-12 text-center">
            <input type="checkbox" name="recordar"><b> Recordarme</b> <br> <br>
            <button type="submit" class="btn btn-default">Ingresar</button> <br> <br>
          </div>
        </div>
      </form>
    </div>

    <?php footerHTML(); ?>
	<?php cierreHTML(); ?>
  </body>
</html>
