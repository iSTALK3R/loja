<?php
    $usuarioBD = 'root';
    $senhaBD = '';
    $servidorBD = 'localhost:3307';
    //Faz a conexão com o Banco de Dados MySQL
    $conexao = mysqli_connect($servidorBD, $usuarioBD, $senhaBD, 'db_loja');
?>