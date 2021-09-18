<?php

//expressoes regulares para validar os campos
function validarNomes($str)
{

    if (preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/", $str)) {
        return $str;
    } else {
        return '';
    }
}

function validarLogin($str)
{

    if (preg_match("/^[a-zA-Z0-9@_.]+$/", $str) or preg_match("/^[a-zA-Z@_.]+$/", $str) or preg_match("/^[a-zA-Z]+$/", $str) or preg_match("/^[a-zA-Z]+[0-9]+$/", $str)) {
        return $str;
    } else {
        return '';
    }
}

function validarEmail($str)
{

    $expression = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/";
    if (preg_match($expression, $str)) {
        return $str;
    } else {
        return "";
    }
}

function validarToken($str)
{

    if (preg_match("/^[a-z0-9]{32}$/i", $str)) {
        return $str;
    } else {
        return '';
    }
}
function validarCep($str)
{
    if (preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $str)) {
        return $str;
    } else {
        return '';
    }
}

function validarCelular($str)
{
    if (preg_match('/\(\d{2}\)\s\d{4,5}\-\d{4}/', $str)) {
        return $str;
    } else {
        return '';
    }
}



