<?php 
    class ProfissaoModel{
        private $idProfissao;
        private $nomeProfissao;

        public function getIdProfissao():int{
            return $this->idProfissao;
        }
        public function getNomeProfissao():String{
            return $this->nomeProfissao;
        }

        public function setProfissao($profissao){
            $this->idProfissao = $profissao['codFormacao'];
            $this->nomeProfissao = $profissao['nome'];
        }
        public function setIdProfissao($id){
            $this->idProfissao = $id;
        }
        public function setNomeProfissao($nome){
            $this->nomeProfissao = $nome;
        }
    }

?>