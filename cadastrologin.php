<link rel="stylesheet" href="./css/styleLogin.css">
<div class="container">
    <?php
    if (isset($_SESSION["cliente"])) {
        echo "Bem Vindo " . $_SESSION["cliente"]["nome"] . ' <a href="sair.php">Efetuar Logout</a>';
    } else {
    ?>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-lg-5">
                <section class="login">
                    <div class="title">
                        <h4><i class="fas fa-sign-in-alt mr-2"></i> Login</h4>
                    </div>
                    <div class="container">
                        <form method="post" action="?page=EfetuarLogin">
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="password">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha">
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="form-group d-flex justify-content-end col">
                                    <input type="submit" class="btn btn-login" value="Entrar">
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

            <div class="col-sm-12 col-lg-5">
                <section class="register">
                    <div class="title">
                        <h4><i class="fas fa-user-plus mr-2"></i> Registre-se</h4>
                    </div>
                    <div class="container">
                        <form method="post" action="?page=SalvarCliente">
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                                <div class="form-group col">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="password">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-9">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco">
                                </div>
                                <div class="form-group col-3">
                                    <label for="numero">Número</label>
                                    <input type="text" class="form-control" id="numero" name="numero">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep">
                                </div>
                                <div class="form-group col-5">
                                    <label for="estado">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade">
                                </div>
                                <div class="form-group col-3">
                                    <label for="estado">Estado</label>
                                    <select class="custom-select" name="estado">
                                        <option selected>Select</option>
                                        <option>...</option>
                                        <option>SP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <div class="form-group d-flex justify-content-end col">
                                    <input type="button" class="btn btn-clear" value="Limpar">
                                    <input type="submit" class="btn btn-register ml-3" value="Salvar cadastro">
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    <?php
    }
    ?>
</div>