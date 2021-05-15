<?php
    $id = $_GET["id"];

    include("../includes/conexao.php");

    $excluir = mysqli_query($conexao, "delete from tb_usuarios where id = '$id'");
    
    if ($excluir) {
        echo('<script>alert("Usuário removido com Sucesso");</script>');
        echo '<meta http-equiv="refresh" content="0;
        URL=\'home.php?acao=Usuarios\'"/>';
    } else {
        echo '<script>alert("Ocorreu algum problema na Exclusão");</script>';
    }
?>