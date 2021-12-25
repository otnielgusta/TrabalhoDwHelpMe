<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Document</title>
</head>
<body>
    
    <?php
    session_start();
    $valor;
    $cadastrou = false;
    if (isset( $_POST['cliente'])) {
       $valor = "Cliente";
    } else if(isset( $_POST['profissional'])){
        $valor =  "Profissional";
    }
    else if(isset( $_SESSION['profissional']) == false && isset( $_POST['cliente']) == false){
        $valor = $_SESSION['tipo'] ;
        $cadastrou = true;

    }

   


    ?>

    
    <div class="tudo">
        <header>
        <a href="../index.php"><button></button></a>
        </header>
        <div class="corpo">
            <div class="formulario">
                <h1>Login de <?php echo $valor?></h1>
                <form action="FormCadastro.php" method="post">
                <div class="subtitulo">
                <?php
                        if($cadastrou){
                            ?>
                            <p class="cadastrou">Cadastro realizado.</p>
                            <p class="cadastrou">Entre com seus dados.</p>
                            <?php
                            $cadastrou = false;

                        }else{
                        ?>
                            <label class="novo-no-site">Novo no Site?</label>
                            <input name="tipo" type="hidden" id="tipo" value=<?php echo $valor ?> class="input-link" href=""></input> 
                            <input class="link" type="submit" value="Registre-se">

                        <?php

                        }
                    ?>

                   
                </div>
                </form>
                <form action="./validaLogin.php" method="post">
                    <input type="hidden" name="tipo" id="tipo" value="<?php echo $valor ?>">
                    <div class="label-input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="label-input">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha">
                    </div>
                                   
                       
                    
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    
    
</body>
</html>