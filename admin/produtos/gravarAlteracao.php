<?php
	if(isset($_POST["id"])) {
		$id 			= $_POST["id"];
		$name 			= $_POST["produto"];
		$qtd_estoque 	= $_POST["estoque"];
		$valor 			= $_POST["valor"];
		$idSubCategory 	= $_POST["subcategorias"];
		$foto   		= $_FILES["foto"];
		$fotoAtual 		= $_POST["fotoatual"];

		if (!empty($_FILES["foto"]["name"])) {
			$nova_foto    = md5(uniqid()) . '-' . time() . '.jpg';
			$caminho_foto = 'produtos/pics/' . $nova_foto;

			move_uploaded_file($foto["tmp_name"], $caminho_foto);
			unlink($fotoAtual);
		} else {
			$caminho_foto = $fotoAtual;
		}

		include("../includes/conexao.php");
		$update = mysqli_query($conexao, "update tb_produtos set id_sub_categoria = '$idSubCategory', descricao = '$name', qtd_estoque = '$qtd_estoque', valor = '$valor' foto = '$caminho_foto' WHERE id = '$id'");

		if($update) {
			echo '<script>alert("Produto atualizado com Sucesso!");</script>';
			echo '<meta http-equiv="refresh" content="0, URL=\'home.php?acao=Produtos\'"/>';
		} else {
			echo '<script>alert("Erro ao atualizar dados do Produto");</script>';
		}
	}
?>