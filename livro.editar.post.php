<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_POST["id"])) {
    header("location: livro.listagem.php");
    exit();
}

if ($_POST["id"] == "" || $_POST["id"] == null) {
    header("location: livro.listagem.php");
    exit();
}

$livro = LivroRepository::get($_POST["id"]);

if (!$livro) {
    header("location: livro.listagem.php");
    exit();
}


if (!isset($_POST["nome"])){
    header("location: livro.editar.php?id=".$livro->getId());
    exit();
}

if( $_POST["nome"] == "" || $_POST ["nome"] == null){
    header("location: livro.editar.php");
    exit();
}


$livro->setTitulo($_POST["titulo"]);
$livro->setAno($_POST["ano"]);
$livro->setGenero($_POST["genero"]);
$livro->setIsbn($_POST["isbn"]);
$livro->setAutorId($_POST["autor_id"]);
$livro->setAlteracaoFuncionarioId($user->getId());
$livro->setDataAlteracao(date("Y-m-d H:i:s"));

LivroRepository::update($livro);

header("location: livro.editar.php?id=".$livro->getId());
