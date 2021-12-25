<?php
    class Cidade{
        private $idCidade;
        private $nome;
        private $estado;
/*
        public function __construct($id,  $nome, $estado) {
            $this->idCidade = $id;
            $this->nome = $nome;
            $this->estado = $estado;
        }
*/
        public function getIdCidade():int{
            return $this->idCidade;
        }
        public function getNome():string{
            return $this->nome;
        }
        public function getEstado():Estado{
            return $this->estado;
        }

        public function setIdCidade($id){
            $this->idCidade = $id;
           // $this->setEstadoPorId($id);
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setEstadoPorId($id){
            $daoEstado = new DAOEstado();
            $this->estado = $daoEstado->listaPorId($id);
            /*
            $daoEstado = new DAOEstado();
            $dadosEstado = $daoEstado->listaPorId($id);
            $this->estado->setIdEstado($dadosEstado['idEstado']);
            $this->estado->setnome($dadosEstado['nome']);
            $this->estado->setUf($dadosEstado['UF']);
            $this->estado = $daoEstado->listaPorId($id);
            */
        }
        public function setEstado(Estado $uf){
            $this->estado = $uf;
        }

        public function toString(){
            echo "$this->nome<br>";
        }
    }
?>