<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_POST["id"])) {
    header("location: autor.listagem.php");
    exit();
}

if ($_POST["id"] == "" || $_POST["id"] == null) {
    header("location: autor.listagem.php");
    exit();
}

$autor = AutorRepository::get($_POST["id"]);

if (!$autor) {
    header("location: autor.listagem.php");
    exit();
}


if (!isset($_POST["nome"])){
    header("location: autor.editar.php?id=".$autor->getId());
    exit();
}

if( $_POST["nome"] == "" || $_POST ["nome"] == null){
    header("location: autor.editar.php");
    exit();
}


$autor->setNome($_POST["nome"]);
$autor->setAlteracaoFuncionarioId($user->getId());
$autor->setDataAlteracao(date("Y-m-d H:i:s"));

AutorRepository::update($autor);

header("location: autor.listagem.php?id=".$autor->getId());
