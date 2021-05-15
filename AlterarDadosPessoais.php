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

	include("includes/conexao.php");
	$query = mysqli_query($conexao, "update tb_clientes
		set nome = '{$nome}' cpf = '{$cpf}' email = '{$email}' senha = '{$senha}' endereco = '{$endereco}' numero = '{$numero}' cidade = '{$cidade}' estado = '{$estado}' cep = '{$cep}' bairro = '{$bairro}' where id = '{$id}'");

	if ($query) {
		$selecionados = mysqli_query
	}

	if ($query) {
		echo '<h1>Dados atualizados com sucesso</h1>';
	} else {
		echo "Erro ao atualizar dados";
	}
?>