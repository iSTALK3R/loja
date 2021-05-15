<?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        include("../includes/conexao.php");

        $subCategory = mysqli_query($conexao, "select * from tb_subcategoria where id = '$id'");

        $subCategoryData = mysqli_fetch_array($subCategory);
    } else {
        echo '<script>alert("Nenhum registro selecionado para alterar!");</script>';
        exit;
    }
?>
<section class="alt-section">
    <h1>Alteração de Categorias</h1>

    <div class="form-container">
        <form method="post" action="?acao=SalvarAlteracaoSubCategoria" enctype="multipart/form-data">
            <div class="form-group">
                <p>Sub-Categoria</p>
                <input class="form-control" type="text" value="<?php echo $subCategoryData["descricao"] ?>" name="subcategoria" placeholder="Sub-Categoria">
            </div>
            <div class="form-group">
                <select name="categorias">
                    <?php
                        include("../includes/conexao.php");

                        $getCategories = mysqli_query($conexao, "select * from tb_categoria ORDER BY descricao");

                        while ($listCategories = mysqli_fetch_array($getCategories)) {
                            if ($subCategoryData['id_categoria'] == $listCategories['id']) {
                                echo "<option value=" . $listCategories['id'] . " selected>" . $listCategories['descricao'] . "</option>";
                            } else {
                                echo "<option value=" . $listCategories['id'] . ">" . $listCategories['descricao'] . "</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $subCategoryData["id"] ?>" name="id">
                <input type="submit" value="Salvar">
            </div>
        </form>
    </div>
</section>
