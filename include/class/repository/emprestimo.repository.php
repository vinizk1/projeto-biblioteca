<?php

class EmprestimoRepository implements repository
{
    public static function listAll(){
        $db = DB::getInstance();

        $sql = "SELECT * from emprestimo";

        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchALL(PDO::FETCH_OBJ) as $row){
            $emprestimo = new Emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->id);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $list[] = $emprestimo;
        }
        return $list;

    }
    public static function get($id)
    {
        $db = DB::getInstance();

        $sql = "SELECT * from autor where id = :id";

        $query = $db->prepare($sql);
        $query->bindParam("id", $id);
        $query->execute();

        if ($query->rowCount() > 0) {
            $row = $query->fetch(PDO::FETCH_OBJ);

            $autor = new Autor;
            $autor->setId($row->id);
            $autor->setNome($row->nome);
            $autor->setDataInclusao($row->data_inclusao);
            $autor->setDataAlteracao($row->data_alteracao);
            $autor->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $autor->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);

            return $autor;
        }
        return null;
    }
    public static function insert($obj){}
 
    public static function update($obj){}
  
    public static function delete($id){}

}
