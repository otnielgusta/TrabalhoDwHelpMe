<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/historico.css">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
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


    $daoUsuario ;
    $usuario;
    $listaConsultas = [];
    $daoConsulta  = new DAOConsulta();
    $consulta = new ConsultaModel();
    $tipoUsuario = $_SESSION["usuario"];
    $tipo = $_POST["tipo"];
    $idUsuario = $_POST["idUsuario"];

    if ($tipo ==  'Cliente') {

        $daoUsuario = new DAOCliente();
        $usuario = new Cliente();
        $result = $daoUsuario->listaPorId($idUsuario);           

        $usuario->setCliente($result); 
        $listaConsultas = $daoConsulta->listaPorIdClienteHistorico($idUsuario);


    }else{
        $daoUsuario = new DAOProfissao();
        $usuario = new Profissional();
        $usuario->setProfissional($tipoUsuario);
    }

    require_once('header.php');
    
?>
<div class="tudo">
    <div class="corpo">
    <div class="resumo-corpo">
            <h1>Histórico de Consultas</h1>

            <?php
                if ($tipo == "Cliente") {
                                  
                ?>
                    <div class="resumo-meio">

                
                    <div class="resumo">
                        <?php
                        $listaConsultas = $daoConsulta->listaPorIdClienteDiario($usuario->getIdcliente());
                        
                        foreach ($listaConsultas as $item) {

                            $consulta->setConsulta($item);

                        ?>
                            <div class="consulta">
                                <div class="foto-consulta-box">

                                    <img class="foto-consulta" src="<?php echo $consulta->getProfissional()->getFoto(); ?>" alt="">
                                </div>
                                <div class="dados-consulta-botao">
                                    <div class="dados-consulta">

                                        <p class="horario"><?php echo "Consulta dia "; echo (new DateTime($consulta->getData()))->format('d/m/Y'); echo" às "; echo (new DateTime($consulta->getHorario()))->format('H:i'); ?></p>
                                        <p class="nome-profissional"><?php echo $consulta->getProfissional()->getNome(); echo " "; echo $consulta->getProfissional()->getSobrenome(); ?></p>
                                        <p class="profissao"><?php echo $consulta->getProfissional()->getProfissao()->getNomeProfissao(); ?></p>
                                    </div>
                                   
                                </div>
                            </div>

                        <?php
                        }

                        ?>

                    </div>
                    </div>
                   
                <?php

                }else{
                ?>
                  
                <?php
                }
                ?>

            </div>
    </div>

</div>
    
</body>
</html>