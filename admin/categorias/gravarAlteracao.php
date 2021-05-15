<?php
	$id          = $_POST["id"];
	$categoria   = $_POST["categoria"];

	include("../includes/conexao.php");
	
	$update = mysqli_query($conexao, "update tb_categoria set descricao = '$categoria' where id = '$id'");

	if ($update) {
		echo '<script>alert("Categoria Atualizado com Sucesso!");</script>';
		echo '<meta http-equiv="refresh" content="0; URL=\'home.php?acao=Categorias\'"/>';
	} else {
		echo '<script>alert("Erro ao atualizar dados da Categoria");</script>';
	}
?>