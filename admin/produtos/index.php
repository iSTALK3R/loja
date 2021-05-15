<section class="form">
    <h1>Controle de Produtos</h1>

    <div class="form-container">
        <form method="post" action="?acao=GravarProduto" enctype="multipart/form-data">
            <div class="file-group">
                <label for="foto"><i class="fa fa-image"></i></label>
                <input type="file" id="foto" class="foto" name="foto">
                <span id="input-file-span">Nenhum arquivo selecionado</span>
            </div>
            <div class="form-group">
                <p>Nome do Produto</p>
                <input type="text" class="form-control" name="produto">
            </div>
            <div class="form-group">
                <p>Estoque</p>
                <input type="text" class="form-control" name="estoque">
            </div>
            <div class="form-group">
                <p>Valor</p>
                <input type="text" class="form-control" name="valor">
            </div>
            <div class="form-group">
                <select name="subcategorias">
                    <option value="-1">Selecione a subcategoria...</option>
                    <?php
                        include("../includes/conexao.php");

                        $getSubCategories = mysqli_query($conexao, "select * from tb_subcategoria");

                        while ($listSubCategories = mysqli_fetch_array($getSubCategories)) {
                            echo "<option value=" . $listSubCategories['id'] . ">" . $listSubCategories['descricao'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-submit" value="Adicionar Produto">
            </div>
        </form>
    </div>
</section>

<section class="table">
    <h2>Produtos Adicionados</h2>

    <table class="category-table" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sub-Categoria</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once("../includes/conexao.php");

                $getProducts = mysqli_query($conexao, "select tp.id, tp.qtd_estoque, tp.foto, tp.valor, ts.descricao AS subcategoria, tp.descricao from tb_produtos tp INNER JOIN tb_subcategoria ts ON tp.id_sub_categoria = ts.id");
                
                while ($listProducts = mysqli_fetch_array($getProducts)) {
                    echo "<tr><td>" . $listProducts["descricao"] . "</td>";
                    echo "<td>" . $listProducts["subcategoria"] . "</td>";
                    echo "<td>" . $listProducts["qtd_estoque"] ." Und" . "</td>";
                    echo "<td>" . "R$ " . $listProducts["valor"] . "</td>";
                    echo "<td><img src='" . $listProducts["foto"] . "' width='50' height='50'></td>";
                    echo '<td><a href="?acao=AlterarProduto&id=' . $listProducts["id"] . '"><img src="../images/alter_icon.png" width="22" height="22"></a>';
                    echo '<a href="?acao=ExcluirProduto&id=' . $listProducts["id"] . '"><img src="../images/excluir_icon.png" width="22" height="22"></a></td>';
                    echo '</td></tr>';
                }
            ?>
        </tbody>
    </table>
</section>

<script>
    var $input = document.getElementById('foto'),
        $inputSpan = document.getElementById('input-file-span');

    $input.addEventListener('change', function() {
        $inputSpan.textContent = this.value;
    });
</script>