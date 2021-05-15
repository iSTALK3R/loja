<?php
$email = addslashes($_POST["email"]);
$senha = addslashes($_POST["senha"]);

include_once("includes/conexao.php");
$login = mysqli_query($conexao, "select * from tb_clientes where email = '$email' and senha = '$senha'");

if (mysqli_num_rows($login) > 0) {
    //Usuario encontrado no banco de dados
    $_SESSION["cliente"] = mysqli_fetch_array($login);
    include("carrinho.php");
} else {
    echo '<center><font color="red">Login e/ou senha incorretos!</font></center>';
    include("cadastrologin.php");
}
