<?php
    class Profissional{
        private $idProfissional;
        private $nome;
        private $sobrenome;
        private $email;
        private $foto;
        private $profissao;
        private $cidade;

        public function setIdProfissional($id){
            $this->idProfissional = $id;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setSobrenome($sobrenome){
            $this->sobrenome = $sobrenome;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setProfissao($profissao){
            $this->profissao = $profissao;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
        public function setFoto($foto){
            $this->foto = $foto;
        }

        public function setProfissional($profissional){
            $daoProfissao = new DAOProfissao();
            $daoCidade = new DAOCidade();
            $this->idProfissional = $profissional['idProfissional'];
            $this->nome = $profissional['nome'];
            $this->sobrenome = $profissional['sobrenome'];
            $this->email = $profissional['email'];
            $this->foto = $profissional['foto'];
            $this->profissao = $daoProfissao->listaProfissaoPorId($profissional['codFormacao']);
            $this->cidade = $daoCidade->listaPorId($profissional['idCidade']);
        }


        public function getIdProfissional():int{
            return $this->idProfissional;
        }
        public function getNome():string{
            return $this->nome;
        }
        public function getSobrenome():string{
            return $this->sobrenome;
        }
        public function getEmail():string{
            return $this->email;
        }
        public function getFoto():string{
            return $this->foto;
        }
        public function getCidade():Cidade{
            return $this->cidade;
        }
        public function getProfissao():ProfissaoModel{
            return $this->profissao;
        }





    }
?>