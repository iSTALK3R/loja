<section class="form">
    <h1>Controle de Categorias</h1>

    <div class="form-container">
        <form method="post" action="?acao=GravarCategoria">
            <div class="form-group">
                <p>Categoria</p>
                <input type="text" class="form-control" name="categoria">
            </div>
            <div class="form-group">
                <input type="submit" class="btn-submit" value="Adicionar Categoria">
            </div>
        </form>
    </div>
</section>

<section class="table">
    <h2>Categorias Cadastradas</h2>

    <table class="category-table" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once("../includes/conexao.php");

                $listaCategorias = mysqli_query($conexao, "select * from tb_categoria");
                
                while ($list = mysqli_fetch_array($listaCategorias)) {
                    echo "<tr><td>" . $list["descricao"] . "</td>";
                    echo '<td><a href="?acao=AlterarCategoria&id=' . $list["id"] . '"><img src="../images/alter_icon.png" width="22" height="22"></a>';
                    echo '<a href="?acao=ExcluirCategoria&id=' . $list["id"] . '"><img src="../images/excluir_icon.png" width="22" height="22"></a></td>';
                    echo '</td></tr>';
                }
            ?>
        </tbody>
    </table>
</section>