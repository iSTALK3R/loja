let $btnDadosPessoais = document.getElementById("dados-pessoais-icon-button"),
    $btnDadosEndereco = document.getElementById("dados-endereco-icon-button");

function mudarIconeDadosPessoais() {
    if ($btnDadosPessoais.classList.contains("fa-caret-up")) {
        $btnDadosPessoais.classList.remove("fa-caret-up");
        $btnDadosPessoais.classList.add("fa-caret-down");
    } else {
        $btnDadosPessoais.classList.remove("fa-caret-down");
        $btnDadosPessoais.classList.add("fa-caret-up");
    }
}

function mudarIconesDadosEndereco() {
    if ($btnDadosEndereco.classList.contains("fa-caret-up")) {
        $btnDadosEndereco.classList.remove("fa-caret-up");
        $btnDadosEndereco.classList.add("fa-caret-down");
    } else {
        $btnDadosEndereco.classList.remove("fa-caret-down");
        $btnDadosEndereco.classList.add("fa-caret-up");
    }
}