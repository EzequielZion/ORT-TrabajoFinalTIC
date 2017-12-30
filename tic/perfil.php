<?php
	require_once("funcionesGraficas.php");
	require_once("functionDB.php");

	$users = selectUsuario($_GET['id']);
	
	if (count ($users) > 0){
	$user = $users[0];
	$mjs = traerMensajes($_GET['id']);
	$comen = isset($_POST['txtComentario']) ? $_POST['txtComentario'] : '';

	if ($_POST) {
		$fecha=date("d/m/Y - H:i");

		var_dump($comen);
		var_dump($_COOKIE['logged']);
		var_dump($user['idUsuarios']);
		var_dump($fecha);
		insertMensaje($_COOKIE['logged'],$comen,$user['idUsuarios'],$fecha);
		header("Refresh:0");
	}	
	}
	
	
 ?>

<html lang="en">
  <head>
		<?php headerHTML("Perfil"); ?>
  </head>
  <body>
	<?php aperturaHTML(); ?>
	<div class="container">
		<?php 
			if (count ($users) > 0){?>
			<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo $user['Foto'];?>" style="height:300px;width:300px;" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h1><b><?php echo $user['nombre'] . " " . $user['apellido'];?></b></h1> 
                        <?php 
                        if (isset($_COOKIE['logged'])){
	                        if ($user['idUsuarios'] == $_COOKIE['logged']){?>
	                        	<a href=<?php echo 'editUsuario.php?id='.$user['idUsuarios']; ?>>Editar perfil</a>
	                        	<?php
	                        }
                    	}?>
                        <h3><i><b>@<?php  echo $user['user'];?></b></i></h3>
												<h4><b>Correo:</b> <?php echo $user['mail'];?></h4>
												<h4><b>Sexo:</b> <?php if($user['sexo'] == 0){echo "Masculino";}else{echo "Femenino";};?></h4>
												<h4><b>Fecha de nacimiento:</b> <?php echo $user['birthday'];?></h4>
												<h4><b>Descripción</h4>
												<h5><?php echo $user['Bio'];?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
		<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="well well-sm">
							<div class="well well-sm">
								<?php
								if (count($mjs) > 0){
									foreach ($mjs as $mj) {
										$userManda = selectUsuario($mj['idEnvia']);
										$elUserManda = $userManda[0];
										if(isset($_COOKIE['logged']))
										{
											if ($_COOKIE['logged']!=$mj['idEnvia']) {
												echo '<h4><a target="_blank" href="perfil.php?id='.$mj['idEnvia'].'">@'.$elUserManda['user'].'</a>'.' a las '.$mj['fechayhora'].'</h4>';
												echo $mj['mensaje'].'<br>';
											}
											else{
												echo '<h4> Yo a las '.$mj['fechayhora'].'</h4>';
												echo $mj['mensaje'].'<br>';
											}
											
										}

										
									}
								} else {
									echo '<p style="text-align:center;"><b>¡Nadie comentó todavía!</b></p>';
								}
								 ?>
							</div>
							<?php if (isset($_COOKIE['logged'])){?>
							<form action="" method="POST">
								<div class="well well-sm">
										<div class="row">
											<textarea rows="8" cols="65" maxlength="254" style="width:96%;resize:none;display: block;margin-left: auto;margin-right: auto;" name="txtComentario" id="descr"></textarea>
										</div>
										<button type="submit" style="background:#4286f4;color:white;margin-top:25px;" class="btn btn-default">Enviar comentario</button> <br>
								</div>
							</form><?php } else {?>
								<div class="well well-sm">
										<div class="row">
											<p style="text-align:center;"><b>¡Tenés que iniciar sesión para comentar!</b></p>
										</div>
								</div> <?php } ?>
            </div>
        </div>
    </div>	
			<?php } else{?>
				<h1> Este usuario no existe. </h1>
			<?php } ?>
		
	</div>
	<?php footerHTML(); ?>
<?php cierreHTML(); ?>
  </body>
</html>
