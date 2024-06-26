<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}


$user = Auth::getUser();

if($_POST["data_nascimento"] >= date("Y-m-d")){
    header("location: cliente.novo.php?DataNascMenor");
    exit();
}

if(!isset($_POST["nome"])){
    header("location: cliente.novo.php?1");
    exit();
}
if(!isset($_POST["telefone"])){
    header("location: cliente.novo.php?1");
    exit();
}
if(!isset($_POST["email"])){
    header("location: cliente.novo.php?1");
    exit();
}
if(!isset($_POST["data_nascimento"])){
    header("location: cliente.novo.php?1");
    exit();
}

if($_POST["nome"] == "" || $_POST["nome"] == null){
    header("location: cliente.novo.php?2");
    exit();
}
if($_POST["telefone"] == "" || $_POST["telefone"] == null){
    header("location: cliente.novo.php?2");
    exit();
}
if($_POST["email"] == "" || $_POST["email"] == null){
    header("location: cliente.novo.php?2");
    exit();
}
if($_POST["data_nascimento"] == "" || $_POST["data_nascimento"] == null){
    header("location: cliente.novo.php?2");
    exit();
}
date_default_timezone_set('America/Sao_Paulo');
$cliente = Factory::cliente();

$cliente->setNome($_POST["nome"]);
$cliente->setTelefone($_POST["telefone"]);
$cliente->setEmail($_POST["email"]);
$cliente->setCpf($_POST["cpf"]);
$cliente->setRg($_POST["rg"]);
$cliente->setDataNascimento($_POST["data_nascimento"]);
$cliente->setInclusaoFuncionarioId($user->getId());
$cliente->setDataInclusao(date("Y-m-d H:i:s"));

$cliente_retorno = ClienteRepository::insert($cliente);

if ($cliente_retorno > 0){
    header("location: cliente.listagem.php?id=".$cliente_retorno);
    exit();
}

header("location: cliente.listagem.php?3");
?>