<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php  
        function dadosCliente($cliente):Cliente{
                $daocidade = new DAOCidade();
                $clienteForeach = new Cliente();
                $clienteForeach->setIdCliente($cliente['idCliente']);
                $clienteForeach->setNome($cliente['nome']);
                $clienteForeach->setSobrenome($cliente['sobrenome']);
                $clienteForeach->setEmail($cliente['email']);
                $clienteForeach->setCidade($daocidade->listaPorId($cliente['idCidade']));
                return $clienteForeach;
        }        
        function mostraTudo($listaClientes){          
            echo '<table border=1>';
            echo '<tr>
            
            <th>Id</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Estado</th>
            
            </tr>';
            foreach ($listaClientes as $cliente) {             
                $clienteForeach = dadosCliente($cliente);
                echo '<tr>';
                    echo '<td>';
                        $clienteForeach->IdToString();
                    echo '</td>';
                    echo '<td>';
                        $clienteForeach->toString();
                    echo '</td>';

                    echo '<td>';
                        $clienteForeach->getCidade()->toString();
                    echo '</td>';
                    echo '<td>';
                        $clienteForeach->getCidade()->getEstado()->toString();
                    echo '</td>';
                echo '</tr>';
                
            }
            echo '</table>';

        }
        $daoCliente = new DAOCliente();
        $listaClientes = $daoCliente->listaTodos(); 
        mostraTudo($listaClientes);
    ?>
    <br><br>
        <a href="FormCadastroCliente.php">Cadastro</a>

</body>
</html>