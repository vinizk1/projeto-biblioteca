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
if($_POST["id"] == '' || $_POST["id"] == null){
    header("location: emprestimo.listagem.php?2");
    exit();
}
$emprestimo = EmprestimoRepository::get($_POST["id"]);
if(!$emprestimo){
    header("location: emprestimo.listagem.php?3");
    exit();
}

date_default_timezone_set("American/Sao_Paulo");
$emprestimo->setDataAlteracao(date('Y-m-d'));
$emprestimo->setAlteracaoFuncionarioId($user->getId());
$emprestimo->setDevolucaoFuncionarioId($user->getId());
$emprestimo->setDataDevolucao(date('Y-m-d H:i:s'));


EmprestimoRepository::update($emprestimo);

header("Location: emprestimo.listagem.php?alteFunId=". $emprestimo->getAlteracaoFuncionarioId() ."?renovacao_funcionario_id=". $emprestimo->getDevolucaoFuncionarioId() ."?data_alteracao=". $emprestimo->getDataAlteracao() ."?data_renovacao=" . $emprestimo->getDataRenovacao(). "?id=". $emprestimo->getId());