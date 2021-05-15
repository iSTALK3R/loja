<link rel="stylesheet" href="css/styleAlterarDados.css">
<div class="container mt-5 mb-5">
    <?php
    if (isset($_SESSION["cliente"])) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div id="title">
                    <h3>Meus Dados</h3>
                </div>
            </div>
        </div>
        <form method="post" action="?page=AlterarDadosPessoais">
            <input type="hidden" name="id" id="id" value="<?php echo $_SESSION["cliente"]["id"] ?>">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <section class="alterar-dados-pessoais" id="dados-pessoais">
                    <div class="title">
                        <h4><i class="fas fa-user mr-2"></i> Dados Pessoais</h4>
                        <i class="fas fa-caret-up" id="dados-pessoais-icon-button" onclick="mudarIconeDadosPessoais()" data-toggle="collapse" data-target="#form-dados-pessoais"></i>
                    </div>
                    <div class="collapse" id="form-dados-pessoais" data-parent="#dados-pessoais">
                        <div class="container">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION["cliente"]["nome"] ?>">
                                    </div>
                                    <div class=" form-group col">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $_SESSION["cliente"]["cpf"] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION["cliente"]["email"] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="password">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $_SESSION["cliente"]["senha"] ?>">
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="form-group d-flex justify-content-end col">
                                        <input type="submit" class="btn btn-alterar ml-3" value="Salvar alteração">
                                    </div>
                                </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="alterar-dados-endereco" id="dados-endereco">
                    <div class="title">
                        <h4><i class="fas fa-map-marked-alt mr-2"></i> Dados de Endereço</h4>
                        <i class="fas fa-caret-up" id="dados-endereco-icon-button" onclick="mudarIconesDadosEndereco()" data-toggle="collapse" data-target="#form-dados-endereco"></i>
                    </div>
                    <div class="collapse" id="form-dados-endereco" data-parent="#dados-endereco">
                        <div class="container">
                                <div class="form-row">
                                    <div class="form-group col-9">
                                        <label for="endereco">Endereço</label>
                                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $_SESSION["cliente"]["endereco"] ?>">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="numero">Número</label>
                                        <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $_SESSION["cliente"]["numero"] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $_SESSION["cliente"]["bairro"] ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $_SESSION["cliente"]["cep"] ?>">
                                    </div>
                                    <div class="form-group col-5">
                                        <label for="estado">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $_SESSION["cliente"]["cidade"] ?>">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="estado">Estado</label>
                                        <select class="custom-select" name="estado">
                                            <option selected><?php echo $_SESSION["cliente"]["estado"] ?></option>
                                            <option>...</option>
                                            <option>SP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mt-4">
                                    <div class="form-group d-flex justify-content-end col">
                                        <input type="submit" class="btn btn-alterar ml-3" value="Salvar alteração">
                                    </div>
                                </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </form>
</div>
<?php
    } else {
        echo 'Para alterar os dados, é necessários estar logado!';
    }
?>
</div>
<script src="js/changeButtonsIcon.js"></script>