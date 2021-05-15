<?php
	if(isset($_GET["id"])) {
		$id = $_GET["id"];

		include("../includes/conexao.php");
		$fotoProduto = mysqli_query($conexao, "select foto from tb_produto where id = '$id'");
		$foto = mysqli_fetch_array($fotoProduto);

		$delete = mysqli_query($conexao, "delete from tb_produtos where id = '$id'");

		if($delete) {
			unlink('produtos/pics/'.$foto["foto"]);
			echo '<script>alert("Produto excluido com Sucesso");</script>';
			echo '<meta http-equiv="refresh" content="0, URL=\'home.php?acao=Produtos\'"/>';
		} else {
			echo '<script>alert("Erro ao excluir o Produto!");</script>';
		}
	}
?>