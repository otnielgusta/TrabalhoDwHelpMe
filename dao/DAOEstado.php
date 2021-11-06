<?php
    class DAOEstado{
       
        public function listaPorId($id):Estado{
            $result = [];
            $pst = Conexao::getPreparedStatement('select * from estado where idEstado = ?;');
            $pst->bindValue(1, $id);
            $pst->execute();
            $result = $pst->fetch(PDO::FETCH_ASSOC);
            if (is_null($result)) {
                return null;
                print("Foi nulo");
            }else{

                $estado = new Estado();
                $estado->setIdEstado($result['idEstado']);
                $estado->setnome($result['nome']);
                $estado->setUf($result['UF']);    
                
                return $estado;
            }
        }

        public function listaTodos(){
            $lista = [];
            
            $pst = Conexao::getPreparedStatement('select * from estado order by nome asc;');
            $pst->execute();
            $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

       
    }
?>