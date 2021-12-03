<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/homepage.css">
    <title>Home</title>
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
    $usuario ;
    $listaConsultas = [];
    $daoConsulta  = new DAOConsulta();
    $consulta = new ConsultaModel();

    $tipoUsuario = $_SESSION["usuario"];
    $tipo = $_SESSION["tipo"];

    if ($tipo ==  'Cliente') {

        $daoUsuario = new DAOCliente();
        $usuario = new Cliente();
        $usuario->setCliente($tipoUsuario);     

    }else{
        $daoUsuario = new DAOProfissao();
        $usuario = new Profissional();
        $usuario->setProfissional($tipoUsuario);
    }
    
?>
    <div class="tudo">

    <?php require_once('header.php') ?>
    
    <div class="corpo">        
        <div class="acoes-resumo">

            <div class="acoes">
             <div class="botoes">
                <?php
                if ($tipo == "Cliente") {
                                  
                ?>
                        <div class="titulo">

                            <h1>Ações</h1>
                        </div>
                        <form class="form-acoes" action="./FormMarcarConsulta.php" method="post">

                            <input type="hidden"  name="idCliente" id="idCliente" value="<?php echo $usuario->getIdcliente(); ?>">
                            <button type="submit">
                                <div class="btn-acoes">
                                    <div class="btn-image">

                                        <img src="../assets/img/caneta.png" alt="">
                                    </div>
                                    <p>Marcar Consulta</p>
                                </div>
                                </button>
                        </form>
                        <form class="form-acoes" action="./historico.php" method="post">

                            <input type="hidden"  name="idUsuario" id="idUsuario" value="<?php echo $usuario->getIdcliente(); ?>">
                            <input type="hidden"  name="tipo" id="tipo" value="<?php echo $tipo ?>">
                            <button type="submit">
                                <div class="btn-acoes">
                                    <div class="btn-image">

                                        <img src="../assets/img/historico.png" alt="">
                                    </div>
                                    <p>Histórico de consultas</p>
                                </div>
                                </button>
                        </form>
                        <form class="form-acoes" action="./consultasMarcadas.php" method="post">

                            <input type="hidden"  name="idUsuario" id="idUsuario" value="<?php echo $usuario->getIdcliente(); ?>">
                            <input type="hidden"  name="tipo" id="tipo" value="<?php echo $tipo ?>">
                           <button type="submit">
                                <div class="btn-acoes">
                                    <div class="btn-image">

                                        <img src="../assets/img/marcadas.png" alt="">
                                    </div>
                                    <p>Consultas Marcadas</p>
                                </div>
                                </button>
                        </form>
                        
                       
                     
                    </div>

              
                <?php
                }else{
                ?>
                    <ul>
                        <button></button>
                        <button></button>
                        <button></button>
                    </ul>
                <?php
                }
                ?>

            </div>
            <div class="resumo-corpo">
            <h1>Resumo dos Próximos Dias</h1>

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
                                    <div class="botao-consulta">
                                        <button>Ir para consulta</button>
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
    </div>
    
</body>
</html>