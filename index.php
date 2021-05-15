<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Loja</title>

	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
	<script src="https://kit.fontawesome.com/0e123e0c8f.js" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css"> -->

	<link rel="stylesheet" href="css/stylesC.css">
</head>

<body>
	<div class="row">
		<div class="col-lg-12">
			<div class="header-bar">
				<div class="leftSide">
					<a href="admin/index.php"><i class="fas fa-user-shield"></i> Admin</a>
					<a href=""><i class="fas fa-user"></i> Meus Pedidos</a>
					<?php
						if (!isset($_SESSION["cliente"])) {
						?>
							<a href="?page=cadorlog"><i class="fas fa-lock"></i> Login</a>
						<?php
							} else {
							?>
								<a href="?page=Sair"><i class="fas fa-lock"></i> <?php echo $_SESSION["cliente"]["nome"] ?></a>
								<a href="?page=Sair"><i class="fas fa-times"></i> Sair</a>
						<?php
						}
					?>
				</div>
				<div class="rightSide">
					<a href="?page=Empresa"><i class="fas fa-building"></i> Empresa</a>
					<a href="?page=Contato"><i class="fas fa-comment"></i> Contato</a>
				</div>
			</div>
		</div>
	</div>
	<header>
		<div class="row">
			<div class="col-lg-12">
				<div class="top">
					<div class="brandTop">
						<a href=""><img src="images/brand.png" alt="..."></a>
					</div>
					<div class="d-search">
						<form class="form-inline my-2 my-lg-0" id="navForm" method="get">
							<input class="form-control" type="search" placeholder="Pesquisar" id="pesquisa" name="pesquisa">
							<button class="btn my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<div class="cart">
						<a href="?page=CarrinhoDeCompras">
							<button class="btn btn-cart my-1" type="button"><i class="fa fa-shopping-cart"></i> Carrinho | R$
								<?php
									if (isset($_SESSION["totalCarrinho"])) {
										$cartValue = $_SESSION["totalCarrinho"];
										echo number_format($cartValue, 2, ',', '.');
									} else {
										echo '0,00';
									}
								?>
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarMenu">
				<ul class="navbar-nav m-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>

					<?php
						include 'includes/conexao.php';
						$listaCategorias = mysqli_query($conexao, "select * from tb_categoria");

						while ($categorias = mysqli_fetch_array($listaCategorias)) {
							$idCat = $categorias["id"];
							// Busco as SubCategorias relacionadas a categoria atual
							$listaSubCategorias = mysqli_query($conexao, "select * from tb_subcategoria where id_categoria = '$idCat'");
							// Verifico se existem SubCategorias
							if (mysqli_num_rows($listaSubCategorias) > 0) {
								$classeSubItems = 'dropdown-toggle';
							} else {
								$classeSubItems = '';
							}

							echo '<li class="nav-item dropdown">
											<a class="nav-link ' . $classeSubItems . '" href="#" id="automotiveDropdown" role="button" data-toggle="dropdown">
												' . $categorias["descricao"] . '
											</a>';

							if (mysqli_num_rows($listaSubCategorias) > 0) {
								echo '<div class="dropdown-menu">';
								// Lista as subcategorias referentes a esta Categoria
								while ($subcategorias = mysqli_fetch_array($listaSubCategorias)) {
									echo '<a class="dropdown-item" href="?subCategoria=' . $subcategorias["id"] . '">' . $subcategorias["descricao"] . '</a>';
								}
								echo '</div>';
							}
							echo '</li>';
						}
					?>

					<li class="nav-item hidden">
						<a class="nav-link" href="?page=Empresa">Empresa</a>
					</li>
					<li class="nav-item hidden">
						<a class="nav-link" href="?page=Contato">Contato</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="hidden-search">
			<form class="form-inline my-2 my-lg-0" id="navForm" method="get">
				<input class="form-control" type="search" placeholder="Pesquisar" id="pesquisa" name="pesquisa">
				<button class="btn my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</header>

	<section class="carrossel">
		<div id="carrossel-home" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carrossel-home" data-slide-to="0" class="active"></li>
				<li data-target="#carrossel-home" data-slide-to="1"></li>
				<li data-target="#carrossel-home" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<a href=""><img src="images/slide1.png" class="d-block w-100" alt="..."></a>
				</div>
				<div class="carousel-item">
					<a href=""><img src="images/slide2.png" class="d-block w-100" alt="..."></a>
				</div>
				<div class="carousel-item">
					<a href=""><img src="images/slide3.png" class="d-block w-100" alt="..."></a>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carrossel-home" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carrossel-home" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</section>

	<section class="ofertas-home mt-5 mb-5">
		<div class="container-home">

			<?php
			if (isset($_GET["page"])) {
				switch ($_GET["page"]) {
					case 'visualizaItem': $incluir = 'visualizar.php'; break;

					case 'CarrinhoDeCompras': $incluir = 'carrinho.php'; break;

					case 'cadorlog': $incluir = 'cadastrologin.php'; break;

					case 'SalvarCliente': $incluir = 'newClient.php'; break;

					case 'EfetuarLogin': $incluir = 'login.php'; break;

					case 'FinalizarCompra': $incluir = 'finalizacompra.php'; break;

					case 'Contato': $incluir = 'contato.php'; break;

					case 'Empresa': $incluir = 'empresa.php'; break;

					case 'MeusPedidos': $incluir = 'meusPedidos.php'; break;

					case 'ItensPedido': $incluir = 'pedidos.php'; break;

					case 'MeusDados': $incluir = 'meusdados.php'; break;

					case 'AlterarDadosPessoais': $incluir = 'AlterarDadosPessoais.php'; break;

					case 'Sair': $incluir = 'sair.php'; break;
				}
				include($incluir);
			} else {
			?>

				<div class="row justify-content-center">
					<div class="col-12">
						<div class="titles">
							<h4>OFERTAS EM DESTAQUE</h4>
						</div>
					</div>
				</div>
				<div class="div-ofertas-home">
					<div class="row">
						<?php
						if (isset($_GET["subCategoria"])) {
							$subCat = $_GET["subCategoria"];
							$products = mysqli_query($conexao, "select * from tb_produtos WHERE id_sub_categoria = '$subCat' limit 4");

							if (mysqli_num_rows($products) == 0) {
								echo '<font color="red" size="2"><b>Nenhum produto encontrado nesta categoria!</b></font>';
							}
						} else if (isset($_GET["pesquisa"])) {
							$pesquisa = $_GET["pesquisa"];
							$products = mysqli_query($conexao, "select * from tb_produtos WHERE upper(descricao) like upper('%$pesquisa%') limit 4");
						} else {
							$products = mysqli_query($conexao, "select * from tb_produtos limit 4");
						}

						while ($listProducts = mysqli_fetch_array($products)) {
							echo '
							<div class="col-sm-12 col-md-6 col-lg-3">
								<div class="card" style="width: 18rem;">
									<a href="?page=visualizaItem&id=' . $listProducts["id"] . '"><img src="admin/' . $listProducts["foto"] . '" class="card-img-top" width="400" height="250" alt="' . $listProducts["descricao"] . '"></a>
									<div class="card-body text-center">
										<div class="title-card">
											<p><a href="?page=visualizaItem&id=' . $listProducts["id"] . '" class="card-text">' . $listProducts["descricao"] . '</a></p>
										</div>
										<div class="preco-a-vista">
											<span>R$' . number_format($listProducts["valor"], 2, ',', '.') . '</span>
											<span>à vista</span>
										</div>
										<div class="parcelas">
											<span>ou</span>
											<span>10x de R$' . number_format($listProducts["valor"] / 10, 2, ',', '.') . ' sem juros</span>
										</div>
										<div class="card-buttons">
											<a href="?page=visualizaItem&id=' . $listProducts["id"] . '" class="btn btn-buy btn-block">COMPRAR</a>
										</div>
									</div>
								</div>
							</div>
							';
						}
						?>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</section>

	<section class="tmarcas-home mt-5 mb-5">
		<div class="container-home">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="titles">
						<h4>TOP MARCAS</h4>
					</div>
				</div>
			</div>
			<div class="div-tmarcas-home">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-3">
						<div class="card" style="width: 18rem;">
							<a href=""><img src="images/redragon.png" class="card-img-top" width="400" height="200" alt="..."></a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3">
						<div class="card" style="width: 18rem;">
							<a href=""><img src="images/redragon.png" class="card-img-top" width="400" height="200" alt="..."></a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3">
						<div class="card" style="width: 18rem;">
							<a href=""><img src="images/redragon.png" class="card-img-top" width="400" height="200" alt="..."></a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3">
						<div class="card" style="width: 18rem;">
							<a href=""><img src="images/redragon.png" class="card-img-top" width="400" height="200" alt="..."></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="s-footer">
		<div class="container-fluid mt-3">
			<div class="row justify-content-center text-center">
				<div class="col-lg-4">
					<div class="left-side mb-5">
						<h5>DEPARTAMENTOS</h5>
						<?php
						$categories = mysqli_query($conexao, "select * from tb_categoria order by descricao");
						while ($listCat = mysqli_fetch_array($categories)) {
							echo '<a href="">' . $listCat["descricao"] . '</a>';
						}
						?>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="center mb-5">
						<h5>MINHA CONTA</h5>
						<a href="">Carrinho de Compras</a>
						<a href="?page=MeusPedidos">Meus Pedidos</a>
						<a href="?page=MeusDados">Meus Dados</a>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="right-side">
						<h5>CONTATO</h5>
						<a href="">etecbebedouro@etecbebedouro.com.br</a>
						<a href="">Tel: (17) 3344-9695</a>
					</div>
				</div>
			</div>
			<div class="row text-center mt-3">
				<div class="col-12">
					<small>&copy; 2020 | Alison Gregorio</small>
				</div>
			</div>
		</div>
	</section>

	<script src="node_modules/jquery/dist/jquery.js"></script>
	<script src="node_modules/popper.js/dist/umd/popper.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>

</html>