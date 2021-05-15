<?php
	if(isset($_GET["id"])) {
		$id = $_GET["id"];

		include("../includes/conexao.php");

		$delete = mysqli_query($conexao, "delete from tb_subcategoria WHERE id = '$id'");

		if($delete) {
			echo '<script>alert("Sub-Categoria removida com Sucesso");</script>';
            echo '<meta http-equiv="refresh" content="0; URL=\'home.php?acao=SubCategorias\'"/>';
		} else {
			echo '<script>alert("Houve um problema com a Exclusão");</script>';
		}
	}
?>