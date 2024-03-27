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

if(EmprestimoRepository::countByInclusaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}
if(EmprestimoRepository::countByAlteracaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}
if(EmprestimoRepository::countByDevolucaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}
if(EmprestimoRepository::countByRenovacaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}if(ClienteRepository::countByInclusaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}
if(ClienteRepository::countByAlteracaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}if(AutorRepository::countByInclusaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}
if(AutorRepository::countByAlteracaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}if(LivroRepository::countByInclusaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}
if(LivroRepository::countByAlteracaoFuncionario($funcio->getId()) > 0){
    header("location: funcioList.php");
    exit();
}


FuncionarioRepository::delete($funcionario->getId());

header("location: funcionarios.listagem.php");
