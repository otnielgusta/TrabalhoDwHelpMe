<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <?php
        require '../dao/Conexao.php';
        require '../dao/DAOEstado.php';
        require '../dao/DAOCidade.php';
        require '../dao/DAOCliente.php';
        require '../model/EstadoModel.php';
        require '../model/ClienteModel.php';
    ?>
</head>
<body>
    <h1>
        Cadastro de Clientes
    </h1>
    <?php

        $cliente = new Cliente();
        $daoCliente = new DAOCliente();
        $daoCidade = new DAOCidade();


        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $cidade = $_POST['cidades'];
        $senha = $_POST['senha'];

        $cliente->setNome($nome);
        $cliente->setSobrenome($sobrenome);
        $cliente->setEmail($email);
        $cliente->setCidade($daoCidade->listaPorId($cidade));

        if ($daoCliente->adiciona($cliente, $senha)) {
            echo "Cliente "; echo $cliente->getNome();echo ' '; echo  $cliente->getSobrenome() ;echo" inserido com sucesso!";


        }else{
            echo "Ocorreu um erro ao inserir o cliente!";

        }
        
    ?><br><br>
    <a href="ListagemCliente.php">Listagem</a>

</body>
</html>