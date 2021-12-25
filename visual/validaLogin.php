<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      require '../model/EstadoModel.php';
      require '../model/ClienteModel.php';
      require '../model/ProfissaoModel.php';
      require '../model/ProfissionalModel.php';

    $daoUsuario ;
    $usuario ;
   
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $tipo = $_POST['tipo'];
    
    if ($tipo == "Cliente") {
        $daoUsuario = new DAOCliente();
        $usuario = new Cliente();
        
        $result = $daoUsuario->validaLogin($email, $senha);
        if ( $result == null) {
            echo "Email ou senha incorretos";
        }else{
            $usuario->setCliente($result);
            $_SESSION["usuario"] = $result;
            $_SESSION["tipo"] = "Cliente";
        }

    }else{
        $daoUsuario = new DAOProfissional();
        $usuario = new Profissional();
        $result = $daoUsuario->validaLogin($email, $senha);
        if ($result == null) {
            echo "Email ou senha incorretos";
        }else{
            $usuario->setProfissional($result);
            $_SESSION["usuario"] = $result;
            $_SESSION["tipo"] = "Profissional";
           
        }
      
    }
    header('Location:homePage.php');


?>
    
</body>
</html>