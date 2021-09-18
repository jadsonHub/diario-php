<?php

require '/var/www/progphp.com/app/db/db.php';
require 'deletar.php';

session_start();
$id = $_SESSION['id_user'];
$pass = $_SESSION['password'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$res = mysqli_query($conect, $sql);
$dadosUser = mysqli_fetch_array($res);
if (isset($_SESSION['logado'])) { ?>
    <!doctype html>
    <html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <title>Excluir conta</title>
    </head>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid container center">
            <a class="navbar-brand" href="#">DEV-PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quem somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/user/login/form.php">Fazer login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/user/register/form.php">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <body>


        <div class="container p-3">
            <br><br>

            <h1>Excluir conta</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                <div class="mb-2 col-md-4 has-validation">
                    <p>Agora para darmos continuidade, informe o token enviado para seu email, seu login e senha para prossegurimos com a exclusão da sua conta.
                    </p>
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu login aqui.." required>
                </div>
                <div class="text-danger">
                    <?php echo $erros['login']; ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputPassword1" class="form-label">Token</label>
                    <input type="text" maxlength="32" name="token" class="form-control" id="exampleInputPassword1" placeholder="Digite seu token aqui.." required>
                </div>
                <div class="text-danger">
                    <?php echo $erros['token']; ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputPassword1" class="form-label">senha</label>
                    <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Digite sua  senha aqui..." required>
                </div>
                <div class="text-danger">
                    <?php echo $erros['senha']; ?>
                </div>
                <br>

                <button type="submit" class="btn btn-primary" name="btn-excluir">Excluir conta permanentemente</button>
                <button type="submit" class="btn btn-primary" name="btn-cancelar">Cancelar</button>
                <br><br>
            </form>
        </div><br>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    </body><br><br><br>
    <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->

                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Aviso!</h5>
                    È só um exemplo de como funciona o login e como utilizar bootstrap, sou iniciante!
                    <p>

                    </p>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright: DEV-PHP
        </div>
        <!-- Copyright -->
    </footer>

    </html>



<?php } else {
    header("Location: /app/user/login/form.php");
} ?>