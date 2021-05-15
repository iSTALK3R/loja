<section class="form">
	<h1>Controle de Usuários</h1>

	<div class="form-container">
		<form method="post" action="?acao=GravarUsuario" enctype="multipart/form-data">
			<div class="file-group">
				<label for="foto"><i class="fa fa-user-circle"></i></label>
				<input type="file" id="foto" class="foto" name="foto">
				<span id="input-file-span">Nenhum arquivo selecionado</span>
			</div>
			<div class="form-group">
				<p>Nome</p>
				<input type="text" class="form-control" name="nome">
			</div>
			<div class="form-group">
				<p>Email</p>
				<input type="text" class="form-control" name="email">
			</div>
			<div class="form-group">
				<p>Senha</p>
				<input type="password" class="form-control" name="senha">
			</div>
			<div class="form-group">
				<p>Confirmação de Senha</p>
				<input type="password" class="form-control" name="senha2">
			</div>
			<div class="form-group">
				<input type="submit" class="btn-submit" value="Salvar">
			</div>
		</form>
	</div>
</section>

<section class="table">
	<h2>Usuários Cadastrados</h2>

	<table class="users-table" cellspacing="0">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include_once("../includes/conexao.php");

				$usersList = mysqli_query($conexao, "select * from tb_usuarios");

				while ($list = mysqli_fetch_array($usersList)) {
					echo "<tr><td>" . $list["nome"] . "</td>";
					echo "<td>" . $list["email"] . "</td>";
					echo '<td><a href="?acao=AlterarUsuario&id=' . $list["id"] . '"><img src="../images/alter_icon.png" width="22" height="22"></a>';
					echo '<a href="?acao=ExcluirUsuario&id=' . $list["id"] . '"><img src="../images/excluir_icon.png" width="22" height="22"></a></td>';
					echo '</td></tr>';
				}
			?>
		</tbody>
	</table>
</section>

<script>
	var $input = document.getElementById('foto'),
		$inputSpan = document.getElementById('input-file-span');

	$input.addEventListener('change', function() {
		$inputSpan.textContent = this.value;
	});
</script>