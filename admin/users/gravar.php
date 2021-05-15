<?php
	$nome   = $_POST["nome"];
	$email  = $_POST["email"];
	$senha  = $_POST["senha"];
	$senha2 = $_POST["senha2"];
	$foto   = $_FILES["foto"];

	if ($senha != $senha2) {
		echo '<script>alert("As senhas não são iguais, verifique");</script>';	
		include("usuarios/index.php");
		exit;
	}

	$nova_foto    = md5(uniqid()) . '-' . time() . '.jpg';
	$caminho_foto = 'users/pics/'.$nova_foto;

	if (move_uploaded_file($foto["tmp_name"], $caminho_foto)) {
		include("../includes/conexao.php");

		$inserir = mysqli_query($conexao, 
			"insert into tb_usuarios values (0, '$nome', '$email', '$senha', '$caminho_foto')");

		if ($inserir) {
			echo '<script>alert("Usuário Cadastrado com Sucesso!");</script>';
			echo '<meta http-equiv="refresh" content="0; URL=\'home.php?acao=Usuarios\'"/>';
		} else {
			echo '<script>alert("Erro ao inserir Dados do usuário");</script>';
		}
		
	} else {
		echo '<script>alert("Impossivel fazer o upload da Imagem, tente selecionar outra foto");</script>';
		include "users/index.php";
		exit;
	}
?>