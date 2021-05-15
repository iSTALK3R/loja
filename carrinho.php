<?php
function agrupar_itens_semelhantes($arr, $chave)
{
    $tmpItens = array();
    foreach ($arr as $cod => $item) {
        if (isset($tmpItens[$item[$chave]])) {
            $item["qtd"] = $tmpItens[$item[$chave]]['qtd'] + $arr[$cod]["qtd"];
            $tmpItens[$item[$chave]] = $item;
        } else {
            $tmpItens[$item[$chave]] = $item;
        }
    }
    return $tmpItens;
}
?>
<h2>Carrinho de Compras</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor Un.</th>
            <th scope="col">Qtd.</th>
            <th scope="col">Valor Total</th>
            <th scope="col">Remover</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!isset($_SESSION["produtos"])) {
            echo '<tr><td colspan="5">Nenhum Item no Carrinho</td></tr>';
        } else {
            include 'includes/conexao.php';
            $_SESSION["produtos"] = agrupar_itens_semelhantes($_SESSION["produtos"], 'cod_produto');

            $totalDaCompra = 0;
            $totalItem = 0;
            foreach ($_SESSION["produtos"] as $lista) {
                $produto = mysqli_query($conexao, "select * from tb_produtos where id ='" . @$lista["cod_produto"] . "'");
                $dadosProd = mysqli_fetch_array($produto);

                $totalItem = @$lista['qtd'] * $dadosProd["valor"];
                $totalDaCompra = $totalDaCompra + $totalItem;
                echo '<tr><th scope="row">' . @$lista["cod_produto"] . '</th>
                    <td>' . $dadosProd["descricao"] . '</td>
                    <td>' . $dadosProd["valor"] . '</td>
                    <td>' . @$lista["qtd"] . '</td>
                    <td>' . number_format($totalItem, 2, ',', '.') . '</td>
                    <td><a href="delCarrinho.php?item=' . @$lista["cod_produto"] . '">Remover Item</a></td></tr>';
            }
            @$_SESSION["totalCarrinho"] = $totalDaCompra;
        }
        ?>
    </tbody>
    <thead>
        <tr>
            <th scope="col">Total do Carrinho</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"><?php echo @number_format($_SESSION["totalCarrinho"], 2, ',', '.'); ?></th>
            <th scope="col"></th>
        </tr>
    </thead>
</table>
<a href="index.php" class="btn btn-success">Continuar comprando</a>
<a href="?page=FinalizarCompra" class="btn btn-primary">Finalizar compra</a>