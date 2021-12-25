<?php
    class ConsultaModel{

        private $idConsulta;
        private $cliente;
        private $profissional;
        private $data;
        private $horario;


        public function setIdConsulta($id){
            $this->idConsulta = $id;
        }
        public function setCliente(Cliente $cliente){
            $this->cliente = $cliente;
        }
        public function setProfissional(Profissional $profissional){
            $this->profissional = $profissional;
        }
        public function setData($data){
            $this->data = $data;
        }
        public function setHorario($horario){
            $this->horario = $horario;
        }

        public function setConsulta($consulta){
            $daoCliente = new DAOCliente();
            $daoProfissional = new DAOProfissional();

            $this->idConsulta = $consulta['idConsulta'];
            $this->cliente = $daoCliente->listaPorId($consulta['Cliente_idCliente']);
            $this->profissional = $daoProfissional->listaPorId($consulta['Profissional_idProfissional']);
            $this->data = $consulta['data'];
            $this->horario = $consulta['horario'];
        }

        public function getIdConsulta():int{
            return $this->idConsulta;
        }
        public function getCliente():Cliente{
            return $this->cliente;
        }
        public function getProfissional():Profissional{
            return $this->profissional;
        }
        public function getData(){
            return $this->data;
        }
        public function getHorario(){
            return $this->horario;
        }
    }
?>