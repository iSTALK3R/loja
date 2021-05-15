<style>
	h4 {
		margin: 15px 0 40px 15px;
	}

	table {
		border: solid 1px rgba(0, 0, 0, 0.3);
		width: 80%;
		margin: 10px;
	}

	th {
		background-color: rgb(31, 31, 31);
		color: #fff;
		padding: 10px 0;
		border: solid 1px rgba(255, 255, 255, 0.5);
	}

	td {
		border: solid 1px rgba(0, 0, 0, 0.3);
		padding: 7px 15px;        
	}
</style>

<?php
$id_pedido = $_GET["idPedido"];
echo '<a href="?acao=Pedidos"><i class="fas fa-arrow-left"></i></a>';
echo "<h4> Itens do Pedido Nº $id_pedido </h4>";
include_once("../includes/conexao.php");
$meuspedidos = mysqli_query($conexao,"SELECT tp.descricao, tp.foto, tip.qtd, tip.valor_un, tip.valor_total FROM tb_itens_pedidos tip
	INNER JOIN tb_produtos tp ON tp.id = tip.id_produto WHERE tip.id_pedido = '$id_pedido'");

	?>
	<center>

		<table cellspacing="0">
			<thead>
				<tr>
					<th>Foto</th>
					<th>Descrição do Produto</th>
					<th>Valor Un.</th>
					<th>Qtd</th>
					<th>Valor Total</th>
				</tr>
			</thead>

			<?php
			//Listo os Pedidos 
			while ($pedido = mysqli_fetch_array($meuspedidos)){
				echo '<tr>';
				echo '<td><img src="'.$pedido["foto"].'" alt="foto" width="40" height="35"></td>';
				echo '<td>'.$pedido["descricao"].'</td>';
				echo '<td>R$ '.number_format($pedido["valor_un"], 2, ',', '.').'</td>';
				echo '<td>'.$pedido["qtd"].'</td>';
				echo '<td>R$ '.number_format($pedido["valor_total"], 2, ',', '.').'</td>';
				echo '</tr>';
			} ?>

		</table>;
	</center>