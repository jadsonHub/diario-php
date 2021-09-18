<?php


require '/var/www/progphp.com/app/db/db.php';
require '/var/www/progphp.com/app/util/functions.php';

//recebor post e mostrar erros
session_start();
session_destroy();

$erros = array();

if (isset($_POST['btn-logar'])) {


    $login = validarLogin(mysqli_escape_string($conect, $_POST['login']));
    $senha = preg_replace('/\s+/', '',mysqli_escape_string($conect, $_POST['senha']));

    if (empty($login) or empty($senha)) {
        $erros['senha'] = "Preencha o campo 'Senha' com uma senha valida!";
        $erros['login'] = "Preencha o campo 'Login' com um login valido!";
    } else {
        
        $senhaCript = md5($senha);
        
    
        $sql = "SELECT * FROM users WHERE login = '$login';";
        $resLogin = mysqli_query($conect, $sql);
    
        $sql = "SELECT * FROM users WHERE senha = '$senhaCript' AND login = '$login'";
        $resUser = mysqli_query($conect, $sql);

        $sql = "SELECT senha FROM users WHERE senha ='$senhaCript';";
        $resSenha = mysqli_query($conect, $sql);
        
        
        if (mysqli_num_rows($resUser)) {

            session_start();
            $dadosUser = mysqli_fetch_array($resUser);
            $_SESSION['logado'] = true;
            $_SESSION['id_user'] = $dadosUser['id'];
            $_SESSION['password'] = $senha;
            header("Location: home.php");

        } 
        if (mysqli_num_rows($resLogin)==0) {
            
            $erros['error'] = "Usuario não existente!, faça o cadastro e tente novamente!";
        } else {
            $erros['invalido'] = "Login/senha incorretos";
        }
    }
}
