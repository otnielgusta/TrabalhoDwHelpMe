<?php

    require '../dao/Conexao.php';
    require '../dao/DAOEstado.php';
    require '../dao/DAOCidade.php';
    require '../dao/DAOCliente.php';
    require '../dao/DAOProfissional.php';
    require '../dao/DAOProfissao.php';
    require '../dao/DAOConsulta.php';
    require '../model/EstadoModel.php';
    require '../model/ClienteModel.php';
    require '../model/ProfissionalModel.php';
    require '../model/ConsultaModel.php';
    require '../model/ProfissaoModel.php';

    $idCliente = $_POST['idCliente'];
    $idProfissional = $_POST['profissional'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    $daoConsulta = new DAOConsulta();
    if ($daoConsulta->marcaConsulta($idCliente, $idProfissional, $data, $horario)) {
        echo "<script type='javascript'>alert('Consulta marcada!');";
       
        header('Location:homePage.php');

    }
?>