<?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        include("../includes/conexao.php");

        $categorias = mysqli_query($conexao, "select * from tb_categoria where id = '$id'");

        $categoryData = mysqli_fetch_array($categorias);
    } else {
        echo '<script>alert("Nenhum registro selecionado para alterar!");</script>';
        exit;
    }
?>

<section class="alt-section">
    <h1>Alteração de Categorias</h1>

    <div class="form-container">
        <form method="post" action="?acao=SalvarAlteracaoCategoria" enctype="multipart/form-data">
            <div class="form-group">
                <p>Categoria</p>
                <input class="form-control" type="text" value="<?php echo $categoryData["descricao"] ?>" name="categoria">
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $categoryData["id"] ?>" name="id">
                <input type="submit" value="Salvar">
            </div>
        </form>
    </div>
</section>