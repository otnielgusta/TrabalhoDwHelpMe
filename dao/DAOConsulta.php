<?php
    class DAOConsulta{
        public function listaPorIdClienteDiario($id){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select * from consulta where Cliente_idCliente = ? and data > now();');
            $pst->bindValue(1, $id);            
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function listaPorIdConsulta($id){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select * from consulta where idConsulta = ?;');
            $pst->bindValue(1, $id);            
            $pst->execute();
            $lista = $pst->fetch(PDO::FETCH_ASSOC);
            return $lista;
        }
        public function listaPorIdClienteHistorico($id){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select * from consulta where Cliente_idCliente = ? and data < now();');
            $pst->bindValue(1, $id);            
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function marcaConsulta($idCliente, $idProfissional, $data, $horario){
            $pst = Conexao::getPreparedStatement("insert into consulta(Cliente_idCliente, Profissional_idProfissional, data, horario) values (?,?,?,?)");
            $pst->bindValue(1, $idCliente);
            $pst->bindValue(2, $idProfissional);
            $pst->bindValue(3, $data);
            $pst->bindValue(4, $horario);
            if($pst->execute()){
               return true;
            }else{
                return false;
            }
        }
    }
?>