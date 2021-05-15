<?php
	$categoria   = $_POST["categoria"];

	include("../includes/conexao.php");

	$inserir = mysqli_query($conexao, 
		"insert into tb_categoria VALUES (0, '$categoria')");

	if ($inserir) {
		echo '<script>alert("Categoria Cadastrado com Sucesso!");</script>';
		echo '<meta http-equiv="refresh" content="0; URL=\'home.php?acao=Categorias\'"/>';
	} else {
		echo '<script>alert("Erro ao inserir Dados da Categoria");</script>';
    }
        
	include "categorias/index.php";
	exit;
?>