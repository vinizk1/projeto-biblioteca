<?php
include_once('include/factory.php');

if (!Auth::isAuthenticated()) {
    header("Location: login.php");
    exit();
}

$user = Auth::getUser();

if(!isset($_POST['id'])){
    header("location: emprestimo.listagem.php?1");
    exit();
}
if($_POST["id"] == "" || $_POST["id"] == null){
    header("location: emprestimo.listagem.php?2");
    exit();
}
$emprestimo = EmprestimoRepository::get($_POST["id"]);
if(!$emprestimo){
    header("location: emprestimo.listagem.php?3");
    exit();
}

if (!(
    $emprestimo->getDataDevolucao() == null
    )){
        header("location: emprestimo.listagem.php?4");
        exit();
    }


$emprestimo = Factory::emprestimo();


$emprestimo->setDataDevolucao(date("Y-m-d"));


EmprestimoRepository::update($emprestimo);

header("Location: emprestimo.listagem.php?5");