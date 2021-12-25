<?php
    class Cliente{
        private $idCliente;
        private $nome;
        private $sobrenome;
        private $email;
        private $foto;
        private $cidade;
/*
        public function __construct($idcliente, $nome, $sobrenome,  $email, $cidade) {
            $this->idCliente = $idcliente;
            $this->nome = $nome;
            $this->sobrenome =  $sobrenome;
            $this->email = $email;
            $this->cidade = $cidade;
        }
*/  

        public function setCliente($cliente){
            $daocidade = new DAOCidade();
            $this->idCliente = $cliente['idCliente'];
            $this->nome = $cliente['nome'];
            $this->sobrenome = $cliente['sobrenome'];
            $this->email = $cliente['email'];
            $this->foto = $cliente['foto'];
            $this->cidade = $daocidade->listaPorId($cliente['idCidade']);
        }
        public function setIdCliente($id){
            $this->idCliente = $id;
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
        public function setCidade(Cidade $cidade){
            $this->cidade = $cidade;
        }
        public function setFoto( $foto){
            $this->foto = $foto;
        }


        public function getIdcliente():int{
            return $this->idCliente;
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
        public function getCidade():Cidade{
            return $this->cidade;
        }
        public function getFoto():string{
            return $this->foto;
        }

        public function toString(){
            echo "$this->nome $this->sobrenome";
        }
        public function IdToString(){
            echo "$this->idCliente";
        }
        

    }
?>