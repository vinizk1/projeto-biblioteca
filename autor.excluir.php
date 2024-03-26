<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_GET["id"])) {
    header("location: autor.listagem.php");
    exit();
}

if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: autor.listagem.php");
    exit();
}

$autor = AutorRepository::get($_GET["id"]);

if (!$autor) {
    header("location: autor.listagem.php");
    exit();
}

if(LivroRepository::countByAutor($autor->getID())){
    header("location: autor.listagem.php");
    exit();
}


AutorRepository::delete($autor->getId());

header("location: autor.listagem.php");
