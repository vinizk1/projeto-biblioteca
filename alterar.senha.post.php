<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_POST["id"])) {
    header("location: funcionarios.listagem.php?1");
    exit();
}

if ($_POST["id"] == "" || $_POST["id"] == null) {
    header("location: funcionarios.listagem.php?2");
    exit();
}

$funcionario = FuncionarioRepository::get($_POST["id"]);

if (!$funcionario) {
    header("location: funcionarios.listagem.php?3");
    exit();
}


if (!isset($_POST["senha"])){
    header("location: funcionarios.editar.php?id=".$funcionario->getId());

    exit();
}

if( $_POST["senha"] !=  $_POST ["confirmar_senha"]){
    header("location: alterar.senha.php?id=".$funcionario->getId());
    
    exit();
}

$funcionario->setSenha($_POST["senha"]);
$funcionario->setAlteracaoFuncionarioId($user->getId());
$funcionario->setDataAlteracao(date("Y-m-d H:i:s")); 

FuncionarioRepository::update($funcionario);

header("location: funcionarios.listagem.php?id=".$funcionario->getId());

?>