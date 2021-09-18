<?php

require '/var/www/progphp.com/app/db/db.php';
require '/var/www/progphp.com/app/email/sendEmail.php';
require '/var/www/progphp.com/app/util/functions.php';

$error = array();
if (isset($_POST['btn-cadastrar'])) {



    $login = validarLogin(mysqli_escape_string($conect, $_POST['login']));
    $senha = preg_replace('/\s+/', '', mysqli_escape_string($conect, $_POST['senha']));
    $nome = validarNomes(mysqli_escape_string($conect, $_POST['nome']));
    $cep = validarCep(mysqli_escape_string($conect, $_POST['cep']));
    $bairro = validarNomes(mysqli_escape_string($conect, $_POST['bairro']));
    $estado = validarNomes(mysqli_escape_string($conect, $_POST['estado']));
    $telefone = validarCelular(mysqli_escape_string($conect, $_POST['telefone']));
    $rua = validarNomes(mysqli_escape_string($conect, $_POST['rua']));
    $email = validarEmail(mysqli_escape_string($conect, $_POST['email']));
    $cidade = validarNomes(mysqli_escape_string($conect, $_POST['cidade']));

    $sql = "SELECT * FROM users WHERE login = '$login'";
    $resLogin = mysqli_query($conect, $sql);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $resEmail = mysqli_query($conect, $sql);


    if (empty($login)) {
        $error['errorLogin'] = "Preencha o campo login!";
    }

    if (empty($senha)) {
        $error['errorSenha'] = "Preencha o campo senha!";
    }

    if (empty($cidade)) {
        $erro['errorCidade'] = "Preencha o campo cidade!";
    }
    if (empty($email)) {
        $error['errorEmail'] = "Preencha o campo email!";
    } else if (!mysqli_num_rows($resEmail)) {
    }
    if (mysqli_num_rows($resEmail)) {
        $error['errorEmail'] = "Email já cadastrado!";
    }
    if (empty($rua)) {
        $error['errorRua'] = "Preencha o campo rua!";
    }
    if (empty($bairro)) {
        $error['errorBairro'] = "Preencha o campo Bairro!";
    }

    if (empty($cep)) {
        $error['errorCep'] = "Preencha o campo cep!";
    }

    if (empty($nome)) {
        $error['errorNome'] = "Preencha o campo nome!";
    }
    if (empty($telefone)) {
        $error['errorTelefone'] = "Preencha o campo telefone!";
    }

    if (mysqli_num_rows($resLogin)) {
        $error['errorLogin'] = "Este login já esta em uso, tente outro!";
    }

    if (!mysqli_num_rows($resLogin) && !mysqli_num_rows($resEmail)) {

        $cripSenha = md5($senha);

        $sql = "INSERT INTO users(nome,senha,cep,bairro,estado,rua,email,cidade,telefone,login)VALUES
        ('$nome','$cripSenha','$cep','$bairro','$estado','$rua','$email','$cidade','$telefone','$login');
        ";
        mysqli_query($conect, $sql);


        enviarEmail($email, "Cadastro realizado com sucesso na plataforma DEV-PHP", "Prezado(a) {$nome} <br>A equipe tem o prazer de ter você conosco,
       embora seja só um pequeno projeto seu cadastro já faz muita diferença!.<br><br>Garato! Equipe DEV-PHP.");

        header("Location: /app/user/login/form.php");
    }
}
