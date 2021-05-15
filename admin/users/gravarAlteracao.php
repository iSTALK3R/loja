<?php
	$id   		= $_POST["id"];
	$nome   	= $_POST["nome"];
	$email  	= $_POST["email"];
	$senha  	= $_POST["senha"];
	$senha2 	= $_POST["senha2"];
	$foto   	= $_FILES["foto"];
	$fotoAtual 	= $_POST["fotoatual"];

	if ($senha != $senha2) {
		echo '<script>alert("As senhas não são iguais, verifique e tente novamente");</script>';
		include("usuarios/alterar.php");
		exit;
	}

	if (!empty($_FILES["foto"]["name"])) {
		$nova_foto    = md5(uniqid()) . '-' . time() . '.jpg';
		$caminho_foto = 'users/pics/' . $nova_foto;

		move_uploaded_file($foto["tmp_name"], $caminho_foto);
		unlink($fotoAtual);
	} else {
		$caminho_foto = $fotoAtual;
	}

	include("../includes/conexao.php");
	$update = mysqli_query(
		$conexao,
		"update tb_usuarios set nome = '$nome', email = '$email', senha = '$senha', foto = '$caminho_foto' where id = '$id')"
	);

	if ($update) {
		echo '<script>alert("Usuário Atualizado com Sucesso!");</script>';
		echo '<meta http-equiv="refresh" content="0; URL=\'home.php?acao=Usuarios\'"/>';
	} else {
		echo '<script>alert("Erro ao atualizar Dados do usuário");</script>';
	}
?>