<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_GET["id"])) {
    header("location: cliente.listagem.php");
    exit();
}

if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: cliente.listagem.php");
    exit();
}

$cliente = ClienteRepository::get($_GET["id"]);

if (!$cliente) {
    header("location: cliente.listagem.php");
    exit();
}

if(EmprestimoRepository::countByCliente($cliente->getID())){
    header("location: cliente.listagem.php");
    exit();
}


ClienteRepository::delete($cliente->getId());

header("location: cliente.listagem.php");
