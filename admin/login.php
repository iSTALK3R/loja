<?php
    session_start();
    
    require("../includes/conexao.php");
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $validaLogin = mysqli_query($conexao, 
        "select * from tb_usuarios where email = '$email' and senha = '$senha'");

    if (mysqli_num_rows($validaLogin) > 0 ) {
        $_SESSION["usuarioLogado"] = mysqli_fetch_array($validaLogin);
        header("Location: home.php");
    } else {
        echo '<font color="red">Email e/ou senha inválidos<br></font>';
        include("index.php");
    }
?>