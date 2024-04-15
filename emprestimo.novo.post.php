<?php
include_once("include/factory.php");

if (!Auth::isAuthenticated()) {
    header("location: login.php");
    exit();
}

$user = Auth::getUser();

if (!isset($_POST["cliente"])){
    header("location: emprestimo.novo.php");

    exit();
}

if( $_POST["cliente"] == "" || $_POST ["cliente"] == null){
    header("location: emprestimo.novo.php");
    
    exit();
}

if (!isset($_POST["livro_id"])){
    header("location: emprestimo.novo.php");

    exit();
}

if( $_POST["livro_id"] == "" || $_POST ["livro_id"] == null){
    header("location: emprestimo.novo.php");
    
    exit();
}


if(
    EmprestimoRepository::countByClienteWithNotFinished($_POST["cliente"]) > 0
    ||
    EmprestimoRepository::countByLivroWithNotFinished($_POST["livro_id"] > 0)
){
    header("location: emprestimo.novo.php");
}


date_default_timezone_set('America/Sao_Paulo');
$emprestimo = Factory::emprestimo();

$emprestimo->setClienteId($_POST['cliente']);
$emprestimo->setLivroId($_POST['livro_id']);
$emprestimo->setInclusaoFuncionarioId($user->getID());
$emprestimo->setDataInclusao(date('Y-m-d H:i:s'));
$emprestimo_retorno = EmprestimoRepository::insert($emprestimo);

if($emprestimo_retorno > 0){
    header("location: emprestimo.listagem.php?id=". $emprestimo_retorno);
    exit();
}

header("location: emprestimo.listagem.php");

?>