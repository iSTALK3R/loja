<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Area Administrativa</title>

    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.css">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/loginPage.css">
</head>

<body>

    <?php
        include("../includes/conexao.php");

        $usuarioCadastrado = mysqli_query($conexao, "select * from tb_usuarios limit 1");

        if (mysqli_num_rows($usuarioCadastrado) == 0) {
            mysqli_query($conexao, "insert into tb_usuarios values (0, 'Administrador', 'admin@etec.com', '123', 'users/pics/no_pic.png')");
        }
    ?>
    <div class="container">
        <section class="title">
            <h1>Bem-vindo a Area Administrativa</h1>
            <p>Acesso Restrito</p>
            <a href="../index.php"><button><i class="fa fa-arrow-left"></i> Ir para Loja</button></a>
        </section>
        <section class="login">
            <h1>Login</h1>
            <div class="form-login">
                <form class="form-for-login" id="form-for-login" method="post" action="login.php">
                    <div class="form-group">
                        <img src="../images/user.png">
                        <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <img src="../images/key.png">
                        <input type="password" class="form-control" name="senha" id="inputSenha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn-submit-admin" value="Acessar">
                    </div>
                </form>
            </div>
        </section>

        <footer>
            <div class="copyright">
                <small>&copy; Copyright 2020 | Alison Gregorio</small>
            </div>
        </footer>
    </div>
</body>

</html>