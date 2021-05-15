    <link rel="stylesheet" href="./css/styleVisualizar.css">
    <a href="index.php">Voltar</a>

    <?php
    $id = $_GET["id"];

    $product = mysqli_query($conexao, "select * from tb_produtos where id = '$id'");
    $selectedProduct = mysqli_fetch_array($product);
    ?>

    <section class="sc-visualizar mb-5">
        <div class="container c-a">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-6">
                    <div class="container-image">
                        <img src="admin/<?php echo $selectedProduct["foto"]; ?>" width="400" height="350" alt="<?php echo $selectedProduct["descricao"]; ?>">
                    </div>
                </div>

                <div class="col-sm-12 col-lg-6">
                    <div class="p-contents">
                        <div class="p-title">
                            <h3><?php echo $selectedProduct["descricao"]; ?></h3>
                        </div>
                        <div class="p-info">
                            <p>Código</p>
                            <div class="p-info-icons">
                                <a href=""><i class="fas fa-share-alt mr-3"></i></a>
                                <a href=""><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="p-parcelas">
                            <div class="row">
                                <div class="col-1 mt-3">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="col-11">
                                    <p id="d-parcelas" class="ml-1">
                                        <span id="val" class="val">R$ <?php echo number_format($selectedProduct["valor"], 2, ',', '.'); ?></span><br>
                                        <span id="qtParcelas" class="qtParcelas">10x</span>
                                        de
                                        <span id="parcelas" class="parcelas">R$ <?php echo number_format($selectedProduct["valor"] / 10, 2, ',', '.'); ?></span>
                                        <span id="juros" class="juros">sem juros no cartão</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-avista mt-3">
                            <div class="row">
                                <div class="col-1 mt-3">
                                    <i class="fas fa-barcode"></i>
                                </div>
                                <div class="col-11">
                                    <p id="d-avista" class="ml-1">
                                        <?php
                                        $desconto = $selectedProduct["valor"] * 10 / 100;
                                        $valor = $selectedProduct["valor"] - $desconto;
                                        ?>
                                        <span id="avista" class="avista">R$ <?php echo number_format($valor, 2, ',', '.'); ?></span><br>
                                        à vista no boleto com
                                        <span id="desconto" class="desconto">10%</span>
                                        de desconto
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-buy mt-3">
                            <?php echo '<a href="addCarrinho.php?id=' . $id . '" class="btn btn-buy btn-block"><i class="fas fa-shopping-cart mr-2"></i> Adicionar ao Carrinho</a>'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>