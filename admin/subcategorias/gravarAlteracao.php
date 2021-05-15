<?php
	if(isset($_POST["id"])) {
		$idSubCategory 		= $_POST["id"];
		$idCategory 		= $_POST["categorias"];
		$descSubCategory 	= $_POST["subcategoria"];

		include("../includes/conexao.php");

		$update = mysqli_query($conexao, "update tb_subcategoria set id_categoria = '$idCategory', descricao = '$descSubCategory' WHERE id = '$idSubCategory'");

		if ($update) {
			echo '<script>alert("Sub-Categoria Atualizado com Sucesso!");</script>';
			echo '<meta http-equiv="refresh" content="0; URL=\'home.php?acao=SubCategorias\'"/>';
		} else {
			echo '<script>alert("Erro ao atualizar dados da Sub-Categoria");</script>';
		}
	} else {
		echo '<script>alert("Selecione uma Categoria para Atualizar!");</script>';
		echo '<meta http-equiv="refresh" content="0; URL=\'home.php?acao=SubCategorias\'"/>';
	}
?>