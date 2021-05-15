<?php
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        include("../includes/conexao.php");

        $product = mysqli_query($conexao, "select * from tb_produtos where id = '$id'");

        $productData = mysqli_fetch_array($product);
    } else {
        echo '<script>alert("Nenhum registro selecionado para alterar!");</script>';
        exit;
    }
?>

<section class="form">

    <h1>Controle de Produtos</h1>

    <div class="form-container">
        <form method="post" action="?acao=SalvarAlteracaoProduto">
            <div class="form-group">
                <p>Nome do Produto</p>
                <input type="text" class="form-control" name="produto" value="<?php echo $productData["descricao"] ?>" placeholder="Nome">
            </div>
            <div class="form-group">
                <p>Estoque</p>
                <input type="text" class="form-control" name="estoque" value="<?php echo $productData["qtd_estoque"] ?>" placeholder="Estoque">
            </div>
            <div class="form-group">
                <p>Valor</p>
                <input type="text" class="form-control" name="valor" value="<?php echo $productData["valor"] ?>" placeholder="Valor">
            </div>
            <div class="file-group">
                <p>Foto do Produto</p>
                <label for="foto"><img src="<?php echo $productData["foto"] ?>" style="width: 160px; height: 150px; border-radius: 5px; margin-top: 8px;"></label>
                <input type="file" id="foto" class="foto" name="foto">
            </div>
            <div class="form-group">
                <select name="subcategorias">
                    <?php
                        include("../includes/conexao.php");

                        $getSubCategories = mysqli_query($conexao, "select * from tb_subcategoria");

                        while ($listSubCategories = mysqli_fetch_array($getSubCategories)) {
                            if($productData['id_sub_categoria'] == $listSubCategories['id']) {
                                echo "<option value=" . $listSubCategories['id'] . " selected>" . $listSubCategories['descricao'] . "</option>";
                            } else {
                                echo "<option value='" . $listSubCategories['id'] . "'>" . $listSubCategories['descricao'] . "</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $productData["id"] ?>" name="id">
                <input type="hidden" value="<?php echo $productData["foto"] ?>" name="fotoatual">
                <input type="submit" class="btn-submit" value="Salvar">
            </div>
        </form>
    </div>
</section>