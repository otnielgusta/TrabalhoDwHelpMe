<?php
    class DAOProfissional{

        public function listaPorId($id){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select idProfissional, nome, sobrenome, codFormacao , email, idCidade, foto from profissional where idProfissional = ?;');
            $pst->bindValue(1, $id);            
            $pst->execute();
            $lista = $pst->fetch(PDO::FETCH_ASSOC);
        
            $profissional = new Profissional();
            $profissional->setProfissional($lista);
            return $profissional;
        }

        public function listaPorIdProfissao($id){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select idProfissional, nome, sobrenome, codFormacao , email, idCidade, foto from profissional where codFormacao = ?;');
            $pst->bindValue(1, $id);            
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
            if (empty($lista)) {
                echo "vazia";
                return null;
            }
        
            return $lista;
        }

        public function validaLogin($email, $senha){
            $result = [];
            $pst = Conexao::getPreparedStatement('select idProfissional, nome,  sobrenome, codFormacao, email, idCidade, foto from profissional where email = ? and senha = ?');
            $pst->bindValue(1, $email);
            $pst->bindValue(2, $senha);
            $pst->execute();
            $result = $pst->fetch(PDO::FETCH_ASSOC);

            
            return $result;
        }

        public function adiciona(Profissional $profissional, $idProfissao, $senha): bool{
            $sql = "insert into profissional(nome, sobrenome, email, foto, codFormacao, idCidade, senha) values(?,?,?,?,?,?,?)";
            $pst = Conexao::getPreparedStatement($sql);
            $pst->bindValue(1,$profissional->getNome());
            $pst->bindValue(2,$profissional->getSobrenome());
            $pst->bindValue(3,$profissional->getEmail());
            $pst->bindValue(4,$profissional->getFoto());
            $pst->bindValue(5,$idProfissao);
            $pst->bindValue(6,$profissional->getCidade()->getIdCidade());
            $pst->bindValue(7,$senha);

            if ($pst->execute()) {
                return true;
            }
            return false;
        }
    }
?>