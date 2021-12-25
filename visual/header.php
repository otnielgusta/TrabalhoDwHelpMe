<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/header.css">
    <title>Document</title>
</head>
<body>

<header>
        <div class="head">
            <img class="logo" src="../assets/img/logo.png" />

            <ul>
                <li><a href="./homePage.php">Home</a></li>
                <li><a href="">Perfil</a> </li>
            </ul>
            <div class="opcoes">
                <button class="notificacao"></button>
                <div class="dados">
                    <div style="background: url('<?php echo $usuario->getFoto(); ?>'); background-size: cover;
                    background-repeat: no-repeat;" class="foto">
                    
                    </div>
                    <div class="bem-vindo">
                        <p>Olá, <?php echo $usuario->getNome(); ?></p>
                        <button></button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
</body>
</html>