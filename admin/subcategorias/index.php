<section class="form">

    <h1>Controle de SubCategorias</h1>

    <div class="form-container">
        <form method="post" action="?acao=GravarSubCategoria">
            <div class="form-group">
                <p>Sub-Categoria</p>
                <input type="text" class="form-control" name="subcategoria">
            </div>
            <div class="form-group">
                <select name="categorias">
                    <option value="-1">Selecione a categoria...</option>
                    <?php
                        include("../includes/conexao.php");

                        $getCategories = mysqli_query($conexao, "select * from tb_categoria order by descricao");

                        while ($listCategories = mysqli_fetch_array($getCategories)) {
                            echo "<option value=" . $listCategories['id'] . ">" . $listCategories['descricao'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-submit" value="Adicionar Subcategoria">
            </div>
        </form>
    </div>
</section>

<section class="table">
    <h2>Sub-Categorias Cadastradas</h2>

    <table class="category-table" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once("../includes/conexao.php");

                $getSubCategories = mysqli_query($conexao, "select ts.id, tc.descricao AS categoria, ts.descricao from tb_subcategoria ts INNER JOIN tb_categoria tc ON ts.id_categoria = tc.id");
                
                while ($listSubCategories = mysqli_fetch_array($getSubCategories)) {
                    echo "<tr><td>" . $listSubCategories["descricao"] . "</td>";
                    echo "<td>" . $listSubCategories['categoria'] . "</td>";
                    echo '<td><a href="?acao=AlterarSubCategoria&id=' . $listSubCategories["id"] . '"><img src="../images/alter_icon.png" width="22" height="22"></a>';
                    echo '<a href="?acao=ExcluirSubCategoria&id=' . $listSubCategories["id"] . '"><img src="../images/excluir_icon.png" width="22" height="22"></a></td>';
                    echo '</td></tr>';
                }
            ?>
        </tbody>
    </table>
</section>