<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_GET["id"])) {
    header("location: funcionario.listagem.php");
    exit();
}

if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: funcionario.listagem.php");
    exit();
}

$emprestimo = EmprestimoRepository::get($_GET["id"]);

if (!$emprestimo) {
    header("location: emprestimo.listagem.php");
    exit();
}

if(EmprestimoRepository::countByCliente($cliente->getID())){
    header("location: cliente.listagem.php");
    exit();
}


EmprestimoRepository::delete($emprestimo->getId());

header("location: emprestimo.listagem.php");
