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
        require '../dao/DAOProfissional.php';
        require '../model/EstadoModel.php';
        require '../model/ClienteModel.php';
        require '../model/ProfissionalModel.php';
    ?>
</head>
<body>
    <h1>
        Cadastro de Clientes
    </h1>
    <?php
    session_start();

        $daoCidade = new DAOCidade();
       

        $tipo = $_POST['tipo'];

        $nome;
        $sobrenome;
        $email;
        $foto;
        $cidade;
        $profissao;
        $senha;

        if ($tipo == "Cliente") {
            $cliente = new Cliente();
            $daoCliente = new DAOCliente();

            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $foto = $_POST['foto'];
            $cidade = $_POST['cidades'];
            $senha = $_POST['senha'];

            $cliente->setNome($nome);
            $cliente->setSobrenome($sobrenome);
            $cliente->setEmail($email);
            $cliente->setFoto($foto);

            $cliente->setCidade($daoCidade->listaPorId($cidade));

            if ($daoCliente->adiciona($cliente, $senha)) {
                echo "Cliente "; echo $cliente->getNome();echo ' '; echo  $cliente->getSobrenome() ;echo" inserido com sucesso!";
                 $_SESSION['tipo'] = "Cliente";
                
                header('Location:login.php');
            }else{
                echo "Ocorreu um erro ao inserir o cliente!";
                $_SESSION['tipo'] = "Cliente";
                header('Location:FormCadastro.php');
            }

        }else{
            $profissional = new Profissional();
            $daoProfissional = new DAOProfissional();            

            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $foto = $_POST['foto'];
            $profissao = $_POST['profissoes'];
            $cidade = $_POST['cidades'];
            $senha = $_POST['senha'];

            $profissional->setNome($nome);
            $profissional->setSobrenome($sobrenome);
            $profissional->setEmail($email);
            $profissional->setFoto($foto);
            $profissional->setCidade($daoCidade->listaPorId($cidade));

            if ($daoProfissional->adiciona($profissional, $profissao, $senha)) {
                echo "Profissional "; echo $profissional->getNome();echo ' '; echo  $profissional->getSobrenome() ;echo" inserido com sucesso!";
                $_SESSION['tipo'] = "Profissional";
               
                header('Location:login.php');
    
            }else{
                echo "Ocorreu um erro ao inserir o Profissional!";
                $_SESSION['tipo'] = "Profissional";

                header('Location:FormCadastro.php');
            }

        }


        
        
    ?><br><br>
    <a href="ListagemCliente.php">Listagem</a>

</body>
</html>