<?php

function connect(){
	try {
		return new PDO('mysql:host=localhost;dbname=tic;charset=utf8mb4;port:3306','root','root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	} catch (PDOException $e) {
		return null;
	}
}

function login($mail, $pass){
 $conn = connect();
 $stmt = $conn->prepare("select * from tic.usuarios where mail ='".$mail."' and pass='".$pass."'");
 $stmt->execute();

 if (count($stmt->fetchAll(PDO::FETCH_ASSOC)) > 0){
 	return 1;
 } else{
  return -1;
 }
}

function selectUsuario($id)
{
	try{
		$conn = connect();
		$stmtSelect = $conn->prepare("select * from tic.usuarios where idUsuarios ='".$id."'");
		$stmtSelect->execute();

		return $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){return null;}
}

function selectAllUsers()
{
	try{
		$conn = connect();
		$stmtSelect = $conn->prepare("select * from tic.usuarios");
		$stmtSelect->execute();

		return $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){return null;}
}
function selectUsuariobyMail($mail)
{
	try{
		$conn = connect();
		$stmtSelect = $conn->prepare("select * from tic.usuarios where mail ='".$mail."'");
		$stmtSelect->execute();

		return $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $e){return null;}
}
function traerMensajes($id)
{
	try {
		$conn = connect();
		$stmt = $conn->prepare("select * from tic.mensajes where idRecibe ='".$id."'");
		$stmt->execute();
		$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $mensajes;
	}
	catch(PDOException $e){return null;}
}

function insertMensaje($aidEnvia, $amensaje, $aidRecibe, $afechayhora)
{
	$conn = connect();
	
	$stmt = $conn->prepare('insert into mensajes (idEnvia, mensaje, idRecibe, fechayhora) values (:aidEnvia, :amensaje, :aidRecibe, :afechayhora)');

	$stmt->bindValue(':aidEnvia',$aidEnvia, PDO::PARAM_STR);
	$stmt->bindValue(':amensaje',$amensaje, PDO::PARAM_STR);
	$stmt->bindValue(':aidRecibe',$aidRecibe, PDO::PARAM_STR);
	$stmt->bindValue(':afechayhora',$afechayhora, PDO::PARAM_STR);

	$stmt->execute();
}


function editarUsuario($id, $user, $pass, $nombre, $apellido, $mail, $foto, $birthday, $genero, $desc)
{
	$conn = connect();
	
	$stmt = $conn->prepare('update usuarios set user = :user, pass = :pass, nombre = :nombre, apellido = :apellido, mail = :mail, Foto = :foto, birthday = :cumple, sexo = :sexo, Bio = :bio where idUsuarios = ' . $id);

	$img = sha1(uniqid()).".jpg";

	if ($_FILES['img']['error'] != 4){
		if (move_uploaded_file($_FILES['img']['tmp_name'], "img/".$img)) {
		} 
	} else {
		$img = "placehold.png";
	}

	$stmt->bindValue(':user',$user, PDO::PARAM_STR);
	$stmt->bindValue(':pass',$pass, PDO::PARAM_STR);
	$stmt->bindValue(':nombre',$nombre, PDO::PARAM_STR);
	$stmt->bindValue(':apellido',$apellido, PDO::PARAM_STR);
	$stmt->bindValue(':mail',$mail, PDO::PARAM_STR);
	$stmt->bindValue(':foto',"img/".$img, PDO::PARAM_STR);
	$stmt->bindValue(':cumple',$birthday, PDO::PARAM_STR);
	$stmt->bindValue(':sexo',$genero, PDO::PARAM_STR);
	$stmt->bindValue(':bio',$desc, PDO::PARAM_STR);

	header('Location: '."perfil.php?id=".$id);

	$stmt->execute();
}
