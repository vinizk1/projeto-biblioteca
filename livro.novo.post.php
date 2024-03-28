<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_POST["titulo"])){
    header("location: livro_novo.php?1");

    exit();
}

if( $_POST["titulo"] == "" || $_POST ["titulo"] == null){
    header("location: livro_novo.php?2");
    
    exit();
}

$livro = Factory::livro();

$livro->setTitulo($_POST["titulo"]);
$livro->setAno($_POST["ano"]);
$livro->setGenero($_POST["genero"]);
$livro->setIsbn($_POST["isbn"]);
$livro->setAutorId($_POST["autor"]);
$livro->setInclusaoFuncionarioId($user->getId());
$livro->setDataInclusao(date("Y-m-d H:i:s"));

$livro_retorno = LivroRepository::insert($livro);

if($livro_retorno > 0){
    header("location: livro_editar.php?id=". $livro_retorno);
    exit();
}

header("location: livro_novo.php");

?>