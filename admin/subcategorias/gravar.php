<?php
	if($_POST["categorias"] != -1 ) {
		$idCategory 	= $_POST["categorias"];
		$subCategory 	= $_POST["subcategoria"];

		include("../includes/conexao.php");

		$insert = mysqli_query($conexao, "insert into tb_subcategoria VALUES (0, '$idCategory', '$subCategory')");

		if ($insert) {
			echo '<script>alert("Sub-Categoria adicionada com sucesso!");</script>';
			echo '<meta http-equiv="refresh" content="0, URL=\'home.php?acao=SubCategorias\'"/>';
		} else {
			echo '<script>alert("Houve um erro ao adicionar a Sub-Categoria!");</script>';
		}
	} else {
		echo '<script>alert("Selecione uma Categoria");</script>';
		echo '<meta http-equiv="refresh" content="0, URL=\'home.php?acao=SubCategorias\'"/>';
	}
?>