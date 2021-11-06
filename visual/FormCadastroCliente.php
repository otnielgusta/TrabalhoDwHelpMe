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
    <style type="text/css">
        body{
            font-family: 'Poppins', sans-serif;
        }
        .corpo{
            width: 100%;
            height: 100%;
        }
        .corpo-form{
            width: 30%;
            height: 100%;
        }

        .form{
           display: grid;
           grid-gap: 10px;
        
          
           
        }
        .form label{
            font-size: 12px;

        }
        .div-form{
            display: grid;
        }
        .estado{
            color: #000;
        }
        select{
            font-family: 'Poppins', sans-serif;
        }
        .submit{
            width: 50%;
            background-color: #8257E5;
            color: #fff;
            justify-self: end;
            font-family: 'Poppins', sans-serif;

        }
    </style>
    <?php
        require '../dao/Conexao.php';
        require '../dao/DAOEstado.php';
        require '../dao/DAOCidade.php';
        require '../model/EstadoModel.php';
    ?>
</head>
<body>
    <div class="corpo">
        <h1>
            Cadastro de Clientes
        </h1>
        <div class="corpo-form">

            <form class="form" action="./CadastroClientes.php" method="post">
            <div class="div-form">

                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
            </div>
            <div class="div-form">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome">
            </div>
            <div class="div-form">

                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
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
    <script src="../assets/js/jQuery/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>