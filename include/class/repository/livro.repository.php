<?php

class LivroRepository implements repository
{
    public static function listAll(){
        $db = DB::getInstance();

        $sql = "SELECT * from livro";

        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchALL(PDO::FETCH_OBJ) as $row){
            $livro = new Livro;
            $livro->setId($row->id);
            $livro->setTitulo($row->titulo);
            $livro->setAno($row->ano);
            $livro->setGenero($row->genero);
            $livro->setIsbn($row->isbn);
            $livro->setAutorId($row->autor_id);
            $livro->setDataInclusao($row->data_inclusao);
            $livro->setDataAlteracao($row->data_alteracao);
            $livro->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $livro->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $list[] = $livro;
        }
        return $list;

    }
    public static function get($id)
    {
        $db = DB::getInstance();

        $sql = "SELECT * from livro where id = :id";

        $query = $db->prepare($sql);
        $query->bindParam("id", $id);
        $query->execute();

        if ($query->rowCount() > 0) {
            $row = $query->fetch(PDO::FETCH_OBJ);

            $livro = new Livro;
            $livro->setId($row->id);
            $livro->setTitulo($row->titulo);
            $livro->setAno($row->ano);
            $livro->setGenero($row->genero);
            $livro->setIsbn($row->isbn);
            $livro->setAutorId($row->autor_id);
            $livro->setDataInclusao($row->data_inclusao);
            $livro->setDataAlteracao($row->data_alteracao);
            $livro->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $livro->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);

            return $livro;
        }
        return null;
    }
    public static function insert($obj){}
 
    public static function update($obj){}
  
    public static function delete($id){}

}
