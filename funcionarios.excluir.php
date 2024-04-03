<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_GET["id"])) {
    header("location: funcionarios.listagem.php");
    exit();
}

if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: funcionarios.listagem.php");
    exit();
}

$funcionario = FuncionarioRepository::get($_GET["id"]);

if (!$funcionario) {
    header("location: funcionario.listagem.php");
    exit();
}

if(EmprestimoRepository::countByInclusaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}
if(EmprestimoRepository::countByAlteracaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}
if(EmprestimoRepository::countByDevolucaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}
if(EmprestimoRepository::countByRenovacaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}if(ClienteRepository::countByInclusaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}
if(ClienteRepository::countByAlteracaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}if(AutorRepository::countByInclusaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}
if(AutorRepository::countByAlteracaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}if(LivroRepository::countByInclusaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}
if(LivroRepository::countByAlteracaoFuncionario($funcionario->getId()) > 0){
    header("location: funcionario.listagem.php");
    exit();
}


FuncionarioRepository::delete($funcionario->getId());

header("location: funcionarios.listagem.php");
