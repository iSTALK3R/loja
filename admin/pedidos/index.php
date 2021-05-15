<style>
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

    #visualizar-itens-pedido {
        background-color: #2E6EFF;
        color: #fff;
        padding: 3px 10px;
        border-radius: 5px;
    }
</style>

<section class="form">
    <h1>Controle de Pedidos</h1>

    <?php
    include_once("../includes/conexao.php");
    $meusPedidos = mysqli_query($conexao, "select * from tb_pedidos order by id");
    if (mysqli_num_rows($meusPedidos) == 0) {
        echo "Voce ainda nao possui pedidos";
    } else { ?>
        <table class="table" cellspacing="0">
            <thead>
                <tr>
                    <th>Número do Pedido</th>
                    <th>Data</th>
                    <th>Valor Total</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
        <?php
        // Lista os Pedidos
        while ($pedidos = mysqli_fetch_array($meusPedidos)) {
            echo '<tr>';
            echo '<td><a href="">' . $pedidos["id"] . '</a></td>';
            echo '<td>' . $pedidos["emissao"] . '</td>';
            echo '<td>R$ ' . number_format($pedidos["valor_total"], 2, ',', '.') . '</td>';
            echo '<td><a id="visualizar-itens-pedido" href="?acao=ItensPedido&idPedido=' . $pedidos["id"] . '"><i class="fas fa-eye"></i></a></td>';
            echo '</tr>';
        } ?>
            </tbody>
        </table>
    <?php } 
    ?>
</section>