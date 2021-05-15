<?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        include("../includes/conexao.php");

        $excluir = mysqli_query($conexao, "delete from tb_categoria where id = '$id'");
        
        if ($excluir) {
            echo '<script>alert("Categoria removida com Sucesso");</script>';
            echo '<meta http-equiv="refresh" content="0; URL=\'home.php?acao=Categorias\'"/>';
        } else {
            echo '<script>alert("Houve um problema com a Exclusão");</script>';
        }
    }
?>