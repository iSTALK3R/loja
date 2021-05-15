<?php
session_start();

$item = $_GET["item"];
$qtd  = $_GET["qtd"];

if (isset($_SESSION["produtos"])) {
    unset($_SESSION["produtos"][$item]);
    header("Location: index.php?page=CarrinhoDeCompras");
} else {
    echo 'Nenhum item encontrado para remover';
}
