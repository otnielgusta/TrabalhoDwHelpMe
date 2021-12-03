<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/cadastro.css">
    <link rel="stylesheet" href="../styles/global.css">
    <?php
        require '../dao/Conexao.php';
        require '../dao/DAOEstado.php';
        require '../dao/DAOCidade.php';
        require '../dao/DAOProfissao.php';
        require '../model/EstadoModel.php';
        require '../model/ProfissaoModel.php';
    ?>
</head>
<body>

<?php
    $result = $_POST['tipo'];



?>
<div class="tudo">


    <div class="corpo">
        <div class="formulario">

       
        <h1>
            Cadastro de <?php echo $result ?>
        </h1>
        <div class="corpo-form">

            <form class="form" action="./Cadastro.php" method="post">
                <input name="tipo" type="hidden" id="tipo" value=<?php echo $result; ?> class="input-link" href=""></input> 
                <div class="div-form">

                    <label for="nome">Nome</label>
                    <input placeholder="Ex.: Otniel" type="text" name="nome" id="nome">
                </div>
                <div class="div-form">

                    <label for="sobrenome">Sobrenome</label>
                    <input  placeholder="Ex.: Silva" type="text" name="sobrenome" id="sobrenome">
                </div>
                <div class="div-form">

                    <label for="email">Email</label>
                    <input  placeholder="Ex.: otniel@email.com" type="email" name="email" id="email">
                </div> 
                <div class="div-form">

                    <label for="foto">Foto</label>
                    <input  placeholder="Ex.: https://linkdafoto" type="text" name="foto" id="foto">
                </div>

                <?php
                    if ($result == "Profissional") {
                        $daoProfissao = new DAOProfissao();
                        $profissaoModel = new ProfissaoModel();
                ?>
                        <div class="div-form">
                        <label for="profissoes">Profissão</label>
                        <select name="profissoes" id="profissoes">
                            <option value="-1">Selecione</option>
                            <?php

                            $lista = $daoProfissao->listaProfissoes();

                            foreach ($lista as $profissao) {
                                ?>
                                <option value="<?php echo $profissao['codFormacao'];?>"><?php echo $profissao['nome'] ;?></option>
                                <?php
                            }
                            
                            ?>
                        </select>
                            
                        </div>

                <?php
                    }
                
                ?>
                <div class="div-form">

                        <label>Senha</label>
                        <input type="password" name="senha" id="senha">
                </div>

                <div class="div-form">

                
                    <label for="estados">Estado</label>
                    <?php
                        $daoEstado = new DAOEstado();
                        $daoCidade = new DAOCidade();

                    
                    ?>
                    
                    <select name="estados" id="estados">
                        <option value='-1'>Selecione</option>
                        <?php
                        $listaEstados = $daoEstado->listaTodos();

                        foreach($listaEstados as $estado){
                        ?>                     
                            <option class="estado" value="<?php echo $estado['idEstado']; ?>">
                                <?php echo $estado['nome'] ; echo ' - '; echo $estado['UF']; ?>
                            </option>;
                            
                            <?php
                        }
                        ?>
                
                    </select>
                    </div>
                    <div class="div-form">

                    
                    <label>Cidade</label>
                    <div id="resultado">
                        <small>Aguardando....</small>

                    </div>
                    <td><span id="loading"><img src="../assets/img/pequeno-loader.gif"></span></td>
                    </div>
                    

                    <button class="submit" type="submit">Cadastrar</button>
                    
                    
              
            </form>
        </div>
        </div>              
    </div>
    </div>
    <script src="../assets/js/jQuery/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>