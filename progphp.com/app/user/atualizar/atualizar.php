<?php

require '/var/www/progphp.com/app/db/db.php';
require '/var/www/progphp.com/app/email/sendEmail.php';
require '/var/www/progphp.com/app/util/functions.php';


$error = array();


$validEmail = false;
$validTelefone = false;
$validLogin = false;



if (isset($_POST['btn-alterar'])) {

    session_start();
    $id = $_SESSION['id_user'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $pass = $_SESSION['password'];
    $res = mysqli_query($conect, $sql);
    $dadosUser = mysqli_fetch_array($res);



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

    $sql = "SELECT * FROM users WHERE telefone = '$telefone'";
    $resTel = mysqli_query($conect, $sql);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $resEmail = mysqli_query($conect, $sql);
    $dadosEmail = mysqli_fetch_array($resEmail);

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
    }
    if ($email == $dadosUser['email'] or !mysqli_num_rows($resEmail)) {
        $error['errorEmail'] = "";
        $validEmail = true;
    } else {
        $error['errorEmail'] = "Email já cadastrado";
        $error['email'] = 1;
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
    if ($telefone == $dadosUser['telefone'] or !mysqli_num_rows($resTel)) {
        $error['errorTelefone'] = "";
        $validTelefone = true;
    } else {
        $error['errorTelefone'] = "Este numero já esta em uso!, tente outro";
    }

    if ($login == $dadosUser['login'] or !mysqli_num_rows($resLogin)) {
        $error['errorLogin'] = "";
        $validLogin = true;
    } else {
        $error['errorLogin'] = "Este login já esta em uso, tente outro!";
    }

    if ($validEmail && $validLogin && $validTelefone) {


        $cripSenha = md5($senha);
        var_dump(mysqli_num_rows($resTel));

        $sql = "UPDATE  users set nome = '$nome',senha='$cripSenha',cep='$cep',bairro='$bairro',estado='$estado',rua='$rua',email='$email',cidade='$cidade',telefone='$telefone',login='$login' WHERE id = '$id';";
        mysqli_query($conect, $sql);


        enviarEmail($email, "Cadastro Atualizado com sucesso na plataforma DEV-PHP", "Prezado(a) {$nome} <br>Seu cadastro foi atualizado com sucesso!
         .<br><br>Garato! Equipe DEV-PHP.");

        header("Location: /app/user/login/home.php");
    }
    
}

if(isset($_POST['btn-cancelar'])){
    header("Location: /app/user/login/home.php");
}
