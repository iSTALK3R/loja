<?php
	$name 			= $_POST["produto"];
	$qtdEstoque 	= $_POST["estoque"];
	$valor 			= $_POST["valor"];
	$subCategory 	= $_POST["subcategorias"];
	$foto   		= $_FILES["foto"];

	$nova_foto = md5(uniqid()) . '-' . time() . '.jpg';
	$caminho_foto = 'produtos/pics/' . $nova_foto;

	if (move_uploaded_file($foto["tmp_name"], $caminho_foto)) {
		include("../includes/conexao.php");

		$insert = mysqli_query($conexao, "insert into tb_produtos VALUES (0, '$subCategory', '$name', '$qtdEstoque', '$valor', '$caminho_foto')");

		if($insert) {
			echo '<script>alert("Produto adicionado com Sucesso");</script>';
			echo '<meta http-equiv="refresh" content="0, URL=\'home.php?acao=Produtos\'"/>';
		} else {
			echo '<script>alert("Houve um erro ao adicionar o Produto");</script>';
		}
	} else {
		echo '<script>alert("Impossivel fazer o upload da Imagem, tente selecionar outra foto");</script>';
		include "produtos/index.php";
		exit;
	}
?>