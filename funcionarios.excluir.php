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

/*if(LivroRepository::countByAutor($autor->getID())){
    header("location: autor.listagem.php");
    exit();
}*/


FuncionarioRepository::delete($funcionario->getId());

header("location: funcionarios.listagem.php");
