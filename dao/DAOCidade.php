<?php
    require '../model/CidadeModel.php';
    class DAOCidade{
       
        public function listaPorId($id):Cidade{
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select * from cidade where idCidade = ?;');
            $pst->bindValue(1, $id);
            $pst->execute();
            $lista = $pst->fetch(PDO::FETCH_ASSOC);
            $estado = new DAOEstado();
            $cidade = new Cidade();

            $cidade->setIdCidade($lista['idCidade']);
            $cidade->setNome($lista['nome']);
            $cidade ->setEstado($estado->listaPorId($lista['idEstado']));

            return $cidade;
        }

        public function listaCidadePorIdEstado($id){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select * from cidade where idEstado = ?;');
            $pst->bindValue(1, $id);
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
            
            

            return $lista;
        }

        public function buscaIdEstado($id):int{
            $estado = [];
            $pst = Conexao::getPreparedStatement('select idEstado from cidade where idCidade = ?;');
            $pst->bindValue(1, $id);
            $pst->execute();
            $estado = $pst->fetch(PDO::FETCH_ASSOC);
            return $estado['idEstado'];
        }

       
    }
?>