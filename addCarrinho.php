<?php
session_start();

if (isset($_SESSION["produtos"])) {
    $produtos = $_SESSION["produtos"];
} else {
    $produtos = array();
}

$produtos[] = array('cod_produto' => $_GET["id"], 'qtd' => '1');
$_SESSION["produtos"] = $produtos;
header("Location: index.php?page=CarrinhoDeCompras");
