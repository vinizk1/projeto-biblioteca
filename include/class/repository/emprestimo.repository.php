<?php

class EmprestimoRepository implements Repository{
    public static function listAll(){
        $db = DB::getInstance();

        $sql = "SELECT * FROM emprestimo";

        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            $emprestimo = new emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);

            $list[] = $emprestimo;

        }

        return $list;
    }

    public static function listAllActive(){
        $db = DB::getInstance();

        $sql = "SELECT * FROM emprestimo where data_devolucao is null AND data_vencimento > :data";

        $query = $db->prepare($sql);
        $query->bindValue(":data",date("Y-m-d"));
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            $emprestimo = new emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);

            $list[] = $emprestimo;

        }

        return $list;
    }

    public static function listAllDelayed(){
        $db = DB::getInstance();
        $sql = "SELECT * FROM emprestimo where data_devolucao IS NULL AND data_vencimento < :data";

        $query = $db->prepare($sql);
        $query->bindValue(":data",date("Y-m-d"));
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            $emprestimo = new emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);

            $list[] = $emprestimo;

        }

        return $list;
    }
    public static function listAllReturned(){
        $db = DB::getInstance();

        $sql = "SELECT * FROM emprestimo where data_devolucao is not null";

        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            $emprestimo = new emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);

            $list[] = $emprestimo;

        }

        return $list;
    }

    public static function listAllRenovated(){
        $db = DB::getInstance();

        $sql = "SELECT * FROM emprestimo where data_devolucao is null AND data_renovacao is not null";

        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            $emprestimo = new emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);

            $list[] = $emprestimo;

        }

        return $list;
    }

    public static function listAllNotRenovated(){
        $db = DB::getInstance();

        $sql = "SELECT * FROM emprestimo where data_devolucao is null AND data_renovacao is null";

        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            $emprestimo = new emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);

            $list[] = $emprestimo;

        }

        return $list;
    }

    public static function get($id){
        $db = DB::getInstance();

        $sql = "SELECT * FROM emprestimo WHERE id = :id";

        $query = $db->prepare($sql);
        $query->bindParam(":id",$id);
        $query->execute();

        if($query->rowCount() > 0 ){
            $row = $query->fetch(PDO::FETCH_OBJ);

            $emprestimo = new emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);

            return $emprestimo;
        }
        return null;
    }
    public static function insert ($obj){
        $db = DB::getInstance();
    
            $sql = "INSERT INTO emprestimo (livro_id, cliente_id, data_vencimento, data_inclusao, inclusao_funcionario_id) VALUES (:livro_id, :cliente_id , :data_vencimento,   :data_inclusao, :inclusao_funcionario_id)";
            
            $query = $db->prepare($sql);

            $query->bindValue(":livro_id",$obj->getLivroId());
            $query->bindValue(":cliente_id",$obj->getClienteId());
            $query->bindValue(":data_vencimento",$obj->getDataVencimento());
            $query->bindValue(":data_inclusao",$obj->getDataInclusao());
            $query->bindValue(":inclusao_funcionario_id",$obj->getInclusaoFuncionarioId());
    
            $query->execute();
    
            $id = $db->lastInsertId();
            
            return $id;
    }
    public static function update ($obj){
        $db = DB::getInstance();

        $sql = "UPDATE emprestimo SET data_alteracao = :data_alteracao, data_renovacao = :data_renovacao, data_devolucao = :data_devolucao, alteracao_funcionario_id = :alteracao_funcionario_id, renovacao_funcionario_id = :renovacao_funcionario_id, devolucao_funcionario_id = :devolucao_funcionario_id, data_vencimento = :data_vencimento WHERE id = :id";

        $query = $db->prepare($sql);
        $query->bindValue(":data_alteracao", $obj->getDataAlteracao());
        $query->bindValue(":data_renovacao", $obj->getDataRenovacao());
        $query->bindValue(":data_devolucao", $obj->getDataDevolucao());
        $query->bindValue(":alteracao_funcionario_id", $obj->getAlteracaoFuncionarioId());
        $query->bindValue(":renovacao_funcionario_id", $obj->getRenovacaoFuncionarioId());
        $query->bindValue(":devolucao_funcionario_id", $obj->getDevolucaoFuncionarioId());
        $query->bindValue(":data_vencimento", $obj->getDataVencimento('Y-m-d'));
        $query->bindValue(":id", $obj->getId());
        $query->execute();
    }
    public static function delete ($id){
        $db = DB::getInstance();

        $sql = "DELETE FROM emprestimo WHERE id = :id";

        $query = $db->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public static function countByCliente($cliente_id){
        $db = DB::getInstance();

        $sql = "SELECT count(*) FROM emprestimo WHERE cliente_id  = :cliente_id";

        $query = $db->prepare($sql);
        $query->bindValue(":cliente_id",$cliente_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];

    }

    public static function countByLivro($livro_id){
        $db = DB::getInstance();

        $sql = "SELECT count(*) FROM emprestimo WHERE livro_id  = :livro_id";

        $query = $db->prepare($sql);
        $query->bindValue(":livro_id",$livro_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];

    }

    public static function countByInclusaoFuncionario($inclusao_funcionario_id){
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE inclusao_funcionario_id = :inclusao_funcionario_id'; 

        $query = $db->prepare($sql);
        $query->bindValue(":inclusao_funcionario_id",$inclusao_funcionario_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }
    public static function countByAlteracaoFuncionario($alteracao_funcionario_id){
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE alteracao_funcionario_id = :alteracao_funcionario_id'; 

        $query = $db->prepare($sql);
        $query->bindValue(":alteracao_funcionario_id",$alteracao_funcionario_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }
    public static function countByRenovacaoFuncionario($renovacao_funcionario_id){
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE renovacao_funcionario_id = :renovacao_funcionario_id'; 

        $query = $db->prepare($sql);
        $query->bindValue(":renovacao_funcionario_id",$renovacao_funcionario_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }

    public static function countByDevolucaoFuncionario($devolucao_funcionario_id){
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE devolucao_funcionario_id = :devolucao_funcionario_id'; 

        $query = $db->prepare($sql);
        $query->bindValue(":devolucao_funcionario_id",$devolucao_funcionario_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }

    public static function countByClienteWithNotFinished($cliente_id){
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE cliente_id = :cliente_id AND data_devolucao IS NULL'; 

        $query = $db->prepare($sql);
        $query->bindValue(":cliente_id",$cliente_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }

    public static function countByLivroWithNotFinished($livro_id){
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE livro_id = :livro_id AND data_devolucao IS NULL'; 

        $query = $db->prepare($sql);
        $query->bindValue(":livro_id",$livro_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }

    public static function countByDataRenovacao($emprestimo_id){ 
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE data_renovacao = :emprestimo_id'; 

        $query = $db->prepare($sql);
        $query->bindValue(":emprestimo_id",$emprestimo_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }

    public static function countByDataDevolucao($emprestimo_id){ 
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE data_devolucao = :emprestimo_id'; 

        $query = $db->prepare($sql);
        $query->bindValue(":emprestimo_id",$emprestimo_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }

    public static function countByDataAlteracao($emprestimo_id){ 
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE data_alteracao = :emprestimo_id'; 

        $query = $db->prepare($sql);
        $query->bindValue(":emprestimo_id",$emprestimo_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }
    public static function countByLivrosDevol($livro_id){ 
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE livro_id = :livro_id and data_devolucao is not null'; 

        $query = $db->prepare($sql);
        $query->bindValue(":livro_id", $livro_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }

    public static function countByClientesDevol($cliente_id){ 
        $db = DB::getInstance();

        $sql = 'SELECT count(*) FROM emprestimo WHERE cliente_id = :cliente_id and data_devolucao is not null'; 

        $query = $db->prepare($sql);
        $query->bindValue(":cliente_id",$cliente_id);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["count(*)"];
    }
    
}


?>