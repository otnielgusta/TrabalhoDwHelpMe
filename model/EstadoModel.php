<?php
    class Estado{
        private $idEstado;
        private $nome;
        private $uf;
/*
        public function __construct($id, $nome, $uf) {
            $this->idEstado = $id;
            $this->nome = $nome;
            $this->uf = $uf;
        }
*/
        public function getIdEstado():int{
            return $this->idEstado;
        }
        public function getNome():string{
            return $this->nome;
        }
        public function getUf():string{
            return $this->uf;
        }

        public function setIdEstado($id){
            $this->idEstado = $id;
        }
        public function setnome($nome){
            $this->nome = $nome;
        }
        public function setUf($uf){
            $this->uf = $uf;
        }

        public function toString(){
            echo "$this->nome - $this->uf <br>";
        }
        public function IdtoString(){
            echo "$this->nome - $this->uf <br>";
        }
        public function retornaEstado($dados):Estado{
            $estado = new Estado();
            $estado->setIdEstado($dados['idEstado']);
            $estado->setnome($dados['nome']);
            $estado->setUf($dados['UF']);
            return $estado;
        }


    }

?>