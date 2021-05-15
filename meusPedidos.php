<?php
echo '<h1>Pedidos</h1>';
if (!isset($_SESSION["cliente"])) {
    echo '<h2>Para ver seus pedidos faça login</h2>';
    include("cadastrologin.php");
} else {
    $id_cliente = $_SESSION["cliente"]["id"];
    include_once("includes/conexao.php");
    $meusPedidos = mysqli_query($conexao, "select * from tb_pedidos where id = '$id_cliente'");
    if (mysqli_num_rows($meusPedidos) == 0) {
        echo "Voce ainda nao possui pedidos";
    } else {
        echo '<table class="table"><tr><td>Número do Pedido</td><td>Data</td><td>Valor Total</td></tr>';
        // Lista os Pedidos
        while ($pedidos = mysqli_fetch_array($meusPedidos)) {
            echo '<tr>';
            echo '<td><a href="">' . $pedidos["id"] . '</a></td>';
            echo '<td>' . $pedidos["emissao"] . '</td>';
            echo '<td>' . $pedidos["valor_total"] . '</td>';
            echo '<td><a href="?page=ItensPedido&idPedido=' . $pedidos["id"] . '">Visualizar itens do pedido</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
