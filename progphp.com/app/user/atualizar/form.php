<?php
require '/var/www/progphp.com/app/db/db.php';
require 'atualizar.php';
session_start();
$id = $_SESSION['id_user'];
$pass = $_SESSION['password'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$res = mysqli_query($conect, $sql);
$dadosUser = mysqli_fetch_array($res);
if (!isset($_SESSION['logado'])) {
    header("Location: /app/user/login/form.php");
?>
<?php } else { ?>
    <!doctype html>
    <html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="/app/user/register/jquery-3.6.0.min.js"></script>
        <script src="/app/user/register/jquery.mask.js"></script>
        <script src="/app/user/register/main.js"></script>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <title>Atualizar cadastro</title>
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
                        <a class="nav-link" href="/app/user/login/form.php">Fazer login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/user/login/form.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <body>



        <div class="container p-3">
            <br><br>

            <h1>Atualizar cadastro</h1>


            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <?php ?>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control nome" id="nome" value="<?php echo $dadosUser['nome'] ?>" placeholder="Digite seu nome aqui.." required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorNome'] ?? "" ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $dadosUser['email'] ?>" placeholder="Digite seu e-mail aqui.." required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorEmail'] ?? "" ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" id="login" value="<?php echo $dadosUser['login'] ?>" placeholder="Digite seu login aqui.." required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorLogin'] ?? "" ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" value="<?php echo $pass?>" placeholder="Digite sua senha aqui.." required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorSenha'] ?? "" ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Telefone</label>
                    <input type="text" maxlength="15" name="telefone" class="form-control" id="telefone" value="<?php echo $dadosUser['telefone'] ?>" placeholder="Digite seu telefone aqui..." required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorTelefone'] ?? "" ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Cep</label>
                    <input type="text" name="cep" class="form-control" id="cep" onblur="pesquisacep(this.value);" value="<?php echo $dadosUser['cep'] ?>" placeholder="Digite seu cep aqui.." required>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Bairro</label>
                    <input type="text" name="bairro" class="form-control" id="bairro" value="<?php echo $dadosUser['bairro'] ?> " required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorBairro'] ?? "" ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Rua</label>
                    <input type="text" name="rua" class="form-control" id="rua" value="<?php echo $dadosUser['rua'] ?> " required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorSenha'] ?? "" ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Estado</label>
                    <input type="text" name="estado" class="form-control" id="uf" value="<?php echo $dadosUser['estado'] ?> " required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorEstado'] ?? "" ?>
                </div>
                <div class="mb-2 col-md-4 has-validation">
                    <label for="exampleInputEmail1" class="form-label">Cidade</label>
                    <input type="text" name="cidade" class="form-control" id="cidade" value="<?php echo $dadosUser['cidade'] ?> " required>
                </div>
                <div class="text-danger">
                    <?php echo $error['errorCidade'] ?? "" ?>
                </div>

                <br>
                <div>
                    <button type="submit" class="btn btn-primary btn-lg" name="btn-alterar">Alterar</button>
                    <button type="submit" class="btn btn-primary btn-lg btn-danger" name="btn-cancelar">Cancelar</button>

                </div>

            </form>

        </div>
    </body>









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

<?php } ?>