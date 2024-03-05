<?php

class ClienteRepository implements repository
{
    public static function listAll(){
        $db = DB::getInstance();

        $sql = "SELECT * from cliente";

        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchALL(PDO::FETCH_OBJ) as $row){
            $cliente = new Cliente;
            $cliente->setId($row->id);
            $cliente->setNome($row->nome);
            $cliente->setTelefone($row->telefone);
            $cliente->setEmail($row->email);
            $cliente->setCpf($row->cpf);
            $cliente->setRg($row->rg);
            $cliente->setDataNascimento($row->data_nascimento);
            $cliente->setDataInclusao($row->data_inclusao);
            $cliente->setDataAlteracao($row->data_alteracao);
            $cliente->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $cliente->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $list[] = $cliente;
        }
        return $list;

    }
    public static function get($id)
    {
        $db = DB::getInstance();

        $sql = "SELECT * from cliente where id = :id";

        $query = $db->prepare($sql);
        $query->bindParam(":id", $id);
        $query->execute();

        if ($query->rowCount() > 0) {
            $row = $query->fetch(PDO::FETCH_OBJ);

            $cliente = new Cliente;
            $cliente->setId($row->id);
            $cliente->setNome($row->nome);
            $cliente->setTelefone($row->telefone);
            $cliente->setEmail($row->email);
            $cliente->setCpf($row->cpf);
            $cliente->setRg($row->rg);
            $cliente->setDataNascimento($row->data_nascimento);
            $cliente->setDataInclusao($row->data_inclusao);
            $cliente->setDataAlteracao($row->data_alteracao);
            $cliente->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $cliente->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);

            return $cliente;
        }
        return null;
    }
    public static function insert($obj){}
 
    public static function update($obj){}
  
    public static function delete($id){}

}
