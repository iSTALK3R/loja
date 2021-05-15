<link rel="stylesheet" href="./css/styleContato.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-6 imagem">
            <img src="./images/banner_contato.png" alt="contato">
        </div> <!-- Imagem -->

        <div class="col-sm-12 col-lg-6">
            <form method="post" action="">
                <div class="form-group">
                    <label for="nome"><i class="fas fa-user"></i></label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="telefone"><i class="fas fa-phone"></i></label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="assunto"><i class="fas fa-pen"></i></label>
                    <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto">
                </div>
                <div class="form-group">
                    <label for="mensagem"><i class="fas fa-comment-dots"></i></label>
                    <textarea class="form-control" id="mensagem" name="mensagem" placeholder="Mensagem" rows="4"></textarea>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <input type="submit" class="btn btn-enviar" value="Enviar">
                </div>
            </form> <!-- Formulario -->
        </div>
    </div>
</div>