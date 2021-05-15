<?php
    session_start();

    if (!isset($_SESSION["usuarioLogado"])) {
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Area Administrativa</title>

    <link rel="icon" href="../images/favicon.svg">
    <script src="https://kit.fontawesome.com/0e123e0c8f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <nav class="navbar nav">
        <div class="nav-container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><i class="fa fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?acao=Categorias"><i class="fa fa-list-ul"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?acao=SubCategorias"><i class="fa fa-list"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?acao=Produtos"><i class="fa fa-dropbox"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?acao=Pedidos"><i class="fas fa-history"></i></a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="?acao=Usuarios"><i class="fa fa-users"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sair.php"><i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main" class="main" id="main">
        <div id="Conteudo">
            <?php
                if (isset($_GET["acao"])) {
                    switch ($_GET["acao"]) {
                        // Categorias
                        case 'Categorias':
                            $incluir = 'categorias/index.php';
                            break;
                        case 'GravarCategoria':
                            $incluir = 'categorias/gravar.php';
                            break;
                        case 'ExcluirCategoria':
                            $incluir = 'categorias/excluir.php';
                            break;
                        case 'AlterarCategoria':
                            $incluir = 'categorias/alterar.php';
                            break;
                        case 'SalvarAlteracaoCategoria':
                            $incluir = 'categorias/gravarAlteracao.php';
                            break;
                        // SubCategorias
                        case 'SubCategorias':
                            $incluir = 'subcategorias/index.php';
                            break;
                        case 'GravarSubCategoria':
                            $incluir = 'subcategorias/gravar.php';
                            break;
                        case 'ExcluirSubCategoria':
                            $incluir = 'subcategorias/excluir.php';
                            break;
                        case 'AlterarSubCategoria':
                            $incluir = 'subcategorias/alterar.php';
                            break;
                        case 'SalvarAlteracaoSubCategoria':
                            $incluir = 'subcategorias/gravarAlteracao.php';
                            break;
                        // Produtos
                        case 'Produtos':
                            $incluir = 'produtos/index.php';
                            break;
                        case 'GravarProduto':
                            $incluir = 'produtos/gravar.php';
                            break;
                        case 'ExcluirProduto':
                            $incluir = 'produtos/excluir.php';
                            break;
                        case 'AlterarProduto':
                            $incluir = 'produtos/alterar.php';
                            break;
                        case 'SalvarAlteracaoProduto':
                            $incluir = 'produtos/gravarAlteracao.php';
                            break;
                        // Usuarios
                        case 'Usuarios':
                            $incluir = 'users/index.php';
                            break;
                        case 'GravarUsuario':
                            $incluir = 'users/gravar.php';
                            break;
                        case 'ExcluirUsuario':
                            $incluir = 'users/excluir.php';
                            break;
                        case 'AlterarUsuario':
                            $incluir = 'users/alterar.php';
                            break;
                        case 'SalvarAlteracaoUsuario':
                            $incluir = 'users/gravarAlteracao.php';
                            break;
                        case 'Pedidos':
                            $incluir = 'pedidos/index.php';
                            break;
                        case 'ItensPedido':
                            $incluir = 'pedidos/pedidos.php';
                            break;
                    }
                    include($incluir);
                } else {
                    echo '<h1 id="elseH1"><i class="fa fa-arrow-circle-left" style="font-size: 22px; margin-right: 5px;"></i> Selecione um item no menu ao lado</h1>';
                }
            ?>
        </div>
    </main>
</body>

</html>