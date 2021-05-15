<?php
	$nome       = addslashes($_POST["nome"]);
	$cpf        = addslashes($_POST["cpf"]);
	$email      = addslashes($_POST["email"]);
	$senha      = addslashes($_POST["senha"]);
	$endereco   = addslashes($_POST["endereco"]);
	$numero     = addslashes($_POST["numero"]);
	$cidade     = addslashes($_POST["cidade"]);
	$estado     = addslashes($_POST["estado"]);
	$cep        = addslashes($_POST["cep"]);
	$bairro     = addslashes($_POST["bairro"]);

	include 'includes/conexao.php';
	$insert = mysqli_query($conexao, "insert into tb_clientes VALUES (0, '$nome', '$cpf', '$email', '$senha', '$endereco', '$numero', '$cidade', '$estado', '$cep', '$bairro')");

	if ($insert) {
	    echo '<center><h1>Cadastro efetuado com sucesso!</h1><h2>Agora ja pode efetuar seu login</h2></center>';
	    include('cadastrologin.php');
	} else {
	    echo 'Erro ao tentar cadastrar';
	}
?>