<?php
include_once("include/factory.php");

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

if($cpf = null || $senha = null){
    header("location: login.php");
    exit();
}

if($cpf = "" || $senha = ""){
    header("location: login.php");
    exit();
}

$auth = Auth::login($cpf, $senha);

if(Auth::isAuthenticated()){
    header("location: login.php");
    exit();
}

header("location: login.php");
exit();
?>