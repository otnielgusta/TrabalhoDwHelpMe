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
    $valor;
    if (isset( $_POST['cliente'])) {
       $valor = "Cliente";
    } else if(isset( $_POST['profissional'])){
        $valor =  "Profissional";
    }

   


    ?>

    
    <div class="tudo">
        <header>
        <a href="../index.php"><button></button></a>
        </header>
        <div class="corpo">
            <div class="formulario">
                <h1>Login de <?php echo $valor?></h1>
                <p>Novo no Site? <a href="">Registre-se</a> </p>
                <form action="" method="post">
                    <div class="label-input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="label-input">
                        <label for="Senha">Senha</label>
                        <input type="password" name="Senha" id="Senha">
                    </div>
                    <button type="submit">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>