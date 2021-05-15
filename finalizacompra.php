<?php
    if (isset($_SESSION["cliente"])) {
        //Insere os dados do Pedido no Banco de Dados para gerar o Pedido

        //Gravamos os dados do Pedido

        include("includes/conexao.php");

        //Dados do Pedido
        $totalValue = $_SESSION["totalCarrinho"];
        $client_id = $_SESSION["cliente"]["id"];
        $pedido = mysqli_query($conexao, "insert into tb_pedidos (valor_total, id_cliente) VALUES ('$totalValue', '$client_id')");

        $id_pedido = mysqli_insert_id($conexao);

        //Inserir os dados dos itens
        foreach ($_SESSION["produtos"] as $lista) {
            $produto = mysqli_query($conexao, "select * from tb_produtos where id ='" . @$lista["cod_produto"] . "'");
            $dadosProd = mysqli_fetch_array($produto);

            $id_item = $lista["cod_produto"];
            $qtd_item = $lista["qtd"];
            $valor_item = $dadosProd["valor"];

            $totalItem = @$lista['qtd'] * $dadosProd["valor"];
            // Inserimos os itens
            $pedido = mysqli_query($conexao, "insert into tb_itens_pedidos (id_pedido, id_produto, qtd, valor_un, valor_total) VALUES ('$id_pedido', '$id_item', '$qtd_item', '$valor_item', '$totalItem')");
        }

        unset($_SESSION["produtos"]);
        unset($_SESSION["totalCarrinho"]);
        echo '<meta http-equiv="refresh" content="1; url=index.php?page=MeusPedidos" />';
    } else {
        include("cadastrologin.php");
    }
?>