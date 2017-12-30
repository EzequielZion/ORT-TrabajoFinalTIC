<?php
	require_once("funcionesGraficas.php");
	require_once("functionDB.php");

	$users = selectAllUsers();

?>
<html lang="en">
  <head>
		<?php headerHTML("Index"); ?>
  </head>
  <body>
	<?php aperturaHTML(); ?>
	<div class="container">
		<?php
			if (count ($users) > 0){
				foreach ($users as $u) {?>
					<div class="row">
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="well well-sm">
			                <div class="row">
			                    <div class="col-sm-2 col-md-2">
			                        <img src="<?php echo $u['Foto'];?>" style="height:150px;width:150px;" alt="" class="img-rounded img-responsive" />
			                    </div>
			                    <div class="col-sm-6 col-md-4">
			                        <h3><b><?php echo '<a href="perfil.php?id='.$u['idUsuarios'].'" target="_self">'.$u['nombre'] . " " . $u['apellido']."</a>";?></b></h3>
									<h4><b>Fecha de nacimiento:</b> <?php echo $u['birthday'];?></h4>
									<h4><b>Descripción</b></h4><h5><?php echo $u['Bio'];?></h5>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
		<?php }
	}

		 else{?>
			<h1> Este usuario no existe. </h1>
		<?php } ?>
	</div>
	<?php footerHTML(); ?>
<?php cierreHTML(); ?>
  </body>
</html>
