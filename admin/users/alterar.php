<?php
	$id = $_GET["id"];

	include("../includes/conexao.php");

	$usuarios = mysqli_query($conexao, "select * from tb_usuarios where id = '$id'");

	$userData = mysqli_fetch_array($usuarios);
?>

<section class="alt-section">
	<h1>Alteração de Usuários</h1>

	<div class="form-container">
		<form method="post" action="?acao=SalvarAlteracaoUsuario" enctype="multipart/form-data">
			<div class="form-group">
				<p>Nome</p>
				<input class="form-control" type="text" value="<?php echo $userData["nome"] ?>" name="nome" placeholder="Nome">
			</div>
			<div class="form-group">
				<p>Email</p>
				<input class="form-control" type="text" value="<?php echo $userData["email"] ?>" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<p>Senha</p>
				<input class="form-control" type="password" value="<?php echo $userData["senha"] ?>" name="senha" placeholder="Senha">
			</div>
			<div class="form-group">
				<p>Confirmação de Senha</p>
				<input class="form-control" type="password" value="<?php echo $userData["senha"] ?>" name="senha2" placeholder="Confirmação de Senha">
			</div>
			<div class="file-group">
				<img src="<?php echo $userData["foto"] ?>" width="100" height="100">
				<label for="foto">Trocar foto de perfil <i class="fa fa-image" style="margin-left: 8px;"></i></label>
				<input type="file" id="foto" class="foto" name="foto">
			</div>
			<div class="form-group">
				<input type="hidden" value="<?php echo $userData["id"] ?>" name="id">
				<input type="hidden" value="<?php echo $userData["foto"] ?>" name="fotoatual">
				<input type="submit" value="Salvar">
			</div>
		</form>
	</div>
</section>