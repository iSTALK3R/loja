<?php
$id_pedido = $_GET["idPedido"];
$meusPedidos = mysqli_query($conexao, "select * from tb_itens_pedidos where id_pedido = '$id_pedido'");
if (mysqli_num_rows($meusPedidos) == 0) {
    echo "Voce ainda nao possui pedidos";
} else {
    echo '<table class="table"><tr><td>Descrição do Produto</td><td>Valor Un.</td><td>Qtd</td><td>Valor Total</td></tr>';
        // Listo os Pedidos
    while ($pedidos = mysqli_fetch_array($meusPedidos)) {
        echo '<tr>';
        echo '<td>' . $pedidos["descricao"] . '</td>';
        echo '<td>' . $pedidos["valor_un"] . '</td>';
        echo '<td>' . $pedidos["qtd"] . '</td>';
        echo '<td>' . $pedidos["valor_total"] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>