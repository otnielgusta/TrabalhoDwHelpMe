<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/marcarConsulta.css">
    <title>Document</title>
</head>
<body>
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



       $idCliente;
       $usuario = new Cliente();
       $clienteModel = new Cliente();


        if (isset($_POST['idCliente'])) {
            $idCliente = $_POST['idCliente'];
            $daoUsuario = new DAOCliente();
            $result = $daoUsuario->listaPorId($idCliente);           

            $usuario->setCliente($result); 
        }
    ?>
    <div class="tudo">
        <?php require_once('header.php'); ?>
    <div class="corpo">
    <div class="formulario">
                <h1>Marcação de Consulta</h1>
                
                <form action="./MarcaConsulta.php" method="post">
                    <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $idCliente ?>">

                <div class="label-input">

                    
                        <label for="tipoProfissional">Tipo de Profissional</label>
                        <?php
                            $daoProfissao = new DAOProfissao();
                            $daoProfissional = new daoProfissional();

                        ?>

                        <select name="tipoProfissional" id="tipoProfissional">
                            <option value='-1'>Selecione</option>
                            <?php
                            $listaProfissoes = $daoProfissao->listaProfissoes();
                            $profissaoModel = new ProfissaoModel();

                            foreach($listaProfissoes as $profissao){

                            ?>                     
                                <option class="tipoProfissional" value="<?php echo $profissao['codFormacao']; ?>">
                                    <?php echo $profissao['nome']; ?>
                                </option>;
                                
                                <?php
                            }
                            ?>

                        </select>
                        </div> 
                        <div class="label-input"> 


                        <label>Profissional</label>
                        <div id="resultado">
                            <small>Aguardando....</small>

                        </div>
                        <td><span id="loading"><img src="../assets/img/pequeno-loader.gif"></span></td>
                        </div>


                    <div class="label-input">
                        <label for="data">Data</label>
                        <input type="date" name="data" id="data">
                    </div>
                    <div class="label-input">
                        <label for="horario">Horario</label>
                        <input type="time" name="horario" id="horario">
                    </div>
                                   
                       
                    
                    <button type="submit">Marcar</button>
                </form>
            </div>

    </div>        

    </div>
    <script src="../assets/js/jQuery/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/scriptProfissional.js"></script>
    
</body>

</html>