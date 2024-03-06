<?php

class AutorRepository implements Repository{
    public static function listAll(){
        $db = DB::getInstance();

        $sql = "SELECT * FROM funcionario";

        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            
            $funcionario = new Funcionario;
            $funcionario->setId($row->id);
            $funcionario->setNome($row->nome);
            $funcionario->setCpf($row->cpf);
            $funcionario->setTelefone($row->telefone);
            $funcionario->setSenha($row->senha);
            $funcionario->setEmail($row->email);
            $funcionario->setDataInclusao($row->data_inclusao);
            $funcionario->setDataAlteracao($row->data_alteracao);
            $funcionario->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $funcionario->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);

            $list[] = $funcionario;

        }

        return $list;
    }

    public static function get($id){
        $db = DB::getInstance();

        $sql = "SELECT * FROM autor WHERE id = :id";

        $query = $db->prepare($sql);
        $query->bindParam(":id",$id);
        $query->execute();

        if($query->rowCount() > 0 ){
            $row = $query->fetch(PDO::FETCH_OBJ);

            $funcionario = new Funcionario;
            $funcionario->setId($row->id);
            $funcionario->setNome($row->nome);
            $funcionario->setCpf($row->cpf);
            $funcionario->setTelefone($row->telefone);
            $funcionario->setSenha($row->senha);
            $funcionario->setEmail($row->email);
            $funcionario->setDataInclusao($row->data_inclusao);
            $funcionario->setDataAlteracao($row->data_alteracao);
            $funcionario->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $funcionario->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);

            $list[] = $funcionario;
        }
        return null;
    }
    public static function insert ($obj){}
    public static function update ($obj){}
    public static function delete ($id){}


}


?>