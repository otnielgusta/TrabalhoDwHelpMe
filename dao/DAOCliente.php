<?php
    class DAOCliente{
       
        public function listaPorId($id){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select idCliente, nome, sobrenome, email, idCidade from cliente where idCliente = ?;');
            $pst->bindValue(1, $id);            
            $pst->execute();
            $lista = $pst->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }
        
        public function listaTodos(){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select idCliente, nome, sobrenome, email, idCidade from cliente;');
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function adiciona(Cliente $cliente,  $senha): bool{
            $sql = "insert into cliente(nome,sobrenome,email, idCidade, senha) VALUES ( ?, ?, ?, ?,?);";
            $pst = Conexao::getPreparedStatement($sql);
            $pst->bindValue(1,$cliente->getNome());
            $pst->bindValue(2,$cliente->getSobrenome());
            $pst->bindValue(3,$cliente->getEmail());
            $pst->bindValue(4,$cliente->getCidade()->getIdCidade());
            $pst->bindValue(5,$senha);
            if($pst->execute()){
                $nome = $cliente->getNome();
                $sobrenome = $cliente->getSobrenome();
                return true;
            }else{
                return false;
            }
        }

        public function buscaUltimoId():int{
            $result = [];
            $sql = "select idCliente from cliente order by idCliente desc limit 1;";
            $pst = Conexao::getPreparedStatement($sql);
            $pst->execute();
            $result = $pst->fetch(PDO::FETCH_ASSOC);
            return $result['idCliente'];
            
        }

        public function altera(Cliente $cliente):bool{
            
            $sql = "update cliente set nome = ?, sobrenome = ?, email = ?, idCidade = ? where idCliente = ?;";
            $pst = Conexao::getPreparedStatement($sql);
            $pst->bindValue(1,$cliente->getNome());
            $pst->bindValue(2,$cliente->getSobrenome());
            $pst->bindValue(3,$cliente->getEmail());
            $pst->bindValue(4,$cliente->getCidade()->getIdCidade());
            $pst->bindValue(5,$cliente->getIdcliente());
            if($pst->execute()){
                $nome = $cliente->getNome();
                $sobrenome = $cliente->getSobrenome();
                echo "Cliente $nome $sobrenome alterado com sucesso!";
                return true;
            }else{
                echo "Ocorreu um erro ao alterar o cliente!";
                return false;
            }
        }

        

        public function deleta(int $id){
            $sql = "delete from cliente where idCliente = ?";
            $pst = Conexao::getPreparedStatement($sql);
            $pst->bindValue(1, $id);
            if($pst->execute()){
                echo "Cliente removido com sucesso";
                return true;
            }else{
                echo "Ocorreu um erro ao remover o cliente";
                return false;
            }
        }

       
    }
?>