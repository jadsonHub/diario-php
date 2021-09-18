<?php

require '/var/www/progphp.com/app/db/db.php';
require '/var/www/progphp.com/app/email/sendEmail.php';



$email = preg_replace('/\s+/', '',filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$tokenPost = preg_replace('/\s+/', '',filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$login = preg_replace('/\s+/', '',filter_input(INPUT_POST, 'login', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_SANITIZE_STRING));
$senhaPost = preg_replace('/\s+/', '',filter_input(INPUT_POST, 'senhaNova', FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$senhaRecPost = preg_replace('/\s+/', '',filter_input(INPUT_POST, 'senhaRec', FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS));

$sql = "SELECT * FROM users WHERE email = '$email'";
$res = mysqli_query($conect, $sql);
$dadosUser = mysqli_fetch_array($res);
$id = $dadosUser['id'];
$tokenSend = md5(uniqid(mt_rand(), true));

$erros = array();



if (isset($_POST['btn-continuar'])) {


    if (mysqli_num_rows($res)) {

        $sql = "UPDATE users set token ='$tokenSend' where id = '$id'";
        mysqli_query($conect, $sql);
        //email valido
        enviarEmail($email, "Recuperar de login/senha", "Prezado(a) {$dadosUser['nome']} por medidas de segurança vamos informar o seu login e um token para redefinir a sua senha:<br><br>Token: {$tokenSend}<br>Login: {$dadosUser['login']}<br> <br><strong>Aviso!</strong> esse token é temporario ele expira em 1 min! <br>Atenciosamente Equipe DEV-PHP.");
        session_start();
        $_SESSION['rec-form'] = true;
        $_SESSION['id_user'] = $dadosUser['id'];
        header("Location: form-rec-user.php");
    } else {

        $erros['email'] = "Email invalido!";
    }
}
if (isset($_POST['btn-alterar'])) {
    session_start();


    $sql = "SELECT * FROM users WHERE login = '$login'";
    $res = mysqli_query($conect, $sql);
    $dadosUser = mysqli_fetch_array($res);
    $id = $dadosUser['id'];



    $sql = "SELECT login FROM users WHERE id =' $id';";
    $resLogin = mysqli_query($conect, $sql);

    if (empty($login) or mysqli_num_rows($resLogin) == 0) {
        $erros['login'] = "Login invalido!";
    }
    if (empty($senhaPost) or empty($senhaRecPost)) {
        $erros['senha'] = "Preencha o campo das senhas!";
    }
    if ($senhaPost != $senhaRecPost) {
        $erros['senha'] = "As senhas não conferem!";
    }
    if ($tokenPost != $dadosUser['token']) {
        $erros['token'] = "Token invalido!";
    }

    if (mysqli_num_rows($resLogin) == 1 && ($senhaPost == $senhaRecPost) && ($tokenPost == $dadosUser['token'])) {

        $senhaCript = md5($senhaPost);
        $sql = "UPDATE users set senha = '$senhaCript' WHERE id = '$id'";
        mysqli_query($conect, $sql);


        enviarEmail($dadosUser['email'], "Altera senha realizado com sucesso!", "Prezado(a) {$dadosUser['nome']} sua senha foi alterada com sucesso! faça login com sua nova senha<br> Equeipe DEV-PHP");
        $sql = "UPDATE users set token = '' where id = '$id'";
        mysqli_query($conect,$sql);
        session_start();
        session_unset();
        session_destroy();
        header("Location: /app/user/login/form.php");
    }
}
