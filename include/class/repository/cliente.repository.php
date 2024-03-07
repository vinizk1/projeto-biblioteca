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
    public static function insert($obj){
        $db = DB::getInstance();

        $sql = "INSERT INTO cliente (nome, telefone, email, cpf, rg, data_nascimento, data_inclusao, inclusao_funcionario_id) VALUES(:nome, :telefone, :email, :cpf, :rg, :data_nascimento, :data_inclusao, :inclusao_funcionario_id)";

        $query = $db->prepare($sql);

        $query->bindValue(":nome",$obj->getNome());
        $query->bindValue(":telefone",$obj->getTelefone());
        $query->bindValue(":email",$obj->getEmail());
        $query->bindValue(":cpf",$obj->getCpf());
        $query->bindValue(":rg",$obj->getRg());
        $query->bindValue(":data_nascimento",$obj->getDataNascimento());
        $query->bindValue(":data_inclusao",$obj->getDataInclusao());
        $query->bindValue(":inclusao_funcionario_id",$obj->getInclusaoFuncionarioId());

        $query->execute();

        $id = $db->lastInsertId();

        return $id;
    }
 
    public static function update($obj){
        $db = DB::getInstance();

        $sql = "UPDATE cliente SET nome = :nome, data_alteracao = :data_alteracao, alteracao_funcionario_id = :alteracao_funcionario_id Where id = :id";

        $query = $db->prepare($sql);
        $query->bindValue(":nome",$obj->getNome());
        $query->bindValue(":data_alteracao",$obj->getDataAlteracao());
        $query->bindValue(":alteracao_funcionario_id",$obj->getAlteracaoFuncionarioId());
        $query->bindValue(":id",$obj->getId());
        $query->execute();
    }
  
    public static function delete($id){
        $db = DB::getInstance();

        $sql = "DELETE FROM cliente WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }

}
