<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_GET["id"])) {
    header("location: livro.listagem.php");
    exit();
}

if ($_GET["id"] == "" || $_GET["id"] == null) {
    header("location: livro.listagem.php");
    exit();
}

$livro = LivroRepository::get($_GET["id"]);

if (!$livro) {
    header("location: livro.listagem.php");
    exit();
}

/*if(LivroRepository::countByAutor($autor->getID())){
    header("location: autor.listagem.php");
    exit();
}*/

LivroRepository::delete($livro->getId());

header("location: livro.listagem.php");
