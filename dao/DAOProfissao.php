<?php 
    class DAOProfissao{

        public function listaProfissoes(){
            $result = [];
            $pst = Conexao::getPreparedStatement("select * from formacao");
            $pst->execute();
            $result = $pst->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        public function listaProfissaoPorId($id){
            $result = [];
            $pst = Conexao::getPreparedStatement("select * from formacao where codFormacao = ?");
            $pst->bindValue(1, $id);
            $pst->execute();
            $result = $pst->fetch(PDO::FETCH_ASSOC);
            $profissao = new ProfissaoModel();
            $profissao->setProfissao($result);
            return $profissao;
        }
        public function listaProfissaoPorIdProfissional($id){
            $daoProfissional = new DAOProfissional();
            $profissional = new Profissional();
            $profissional = $daoProfissional->listaPorId($id);

            $result = [];
            $pst = Conexao::getPreparedStatement("select * from formacao where codFormacao = ?");
            $pst->bindValue(1, $profissional->getProfissao()->getIdProfissao());
            $pst->execute();
            $result = $pst->fetch(PDO::FETCH_ASSOC);
            $profissao = new ProfissaoModel();
            $profissao->setProfissao($result);
            return $profissao;
        }
    }

?>