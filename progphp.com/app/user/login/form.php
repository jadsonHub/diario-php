<?php

require_once('login.php');

?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Login</title>
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
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quem somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/app/user/login/form.php">Fazer login</a>
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

        <h1>Central de Login</h1>


        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <div>
                <?php
                   echo $erros['error'];
                   echo $erros['invalido'] ?? '';
                ?>
            </div>
            <div class="mb-2 col-md-4 has-validation">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Digite seu login aqui.." required>
            </div>
            <div class="text-danger">
                <?php echo $erros['login']; ?>
            </div>
            <div class="mb-2 col-md-4 has-validation">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha aqui.." required>
            </div>
            <div class="text-danger">
                <?php echo $erros['senha']?>
            </div>
            <br>

            <button type="submit" class="btn btn-primary" name="btn-logar">Entrar</button>
            <br><br>
            <div>
                <p>Não possui conta? <a class="link" href="/app/user/register/form.php">Cadastrar-se</a></p>
                <p>Esqueceu senha/login? <a class="link" href="/app/user/recuperar/form.php">Recuperar senha/login</a></p>

            </div>

        </form>


    </div>






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