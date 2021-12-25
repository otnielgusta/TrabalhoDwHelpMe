<?php
require_once('../dao/Conexao.php'); 
require '../dao/DAOCidade.php';


$cod = $_POST['estado'];

if(!empty($cod)):
$daoCidade = new DAOCidade();


$result = $daoCidade->listaCidadePorIdEstado($cod);
?>

<select id="cidades" name="cidades">
				<option value="">
					Selecione
				</option>

				<?php 
				 foreach ($result as $row){
				    echo '<option value='.$row['idCidade'].'>'.$row['nome'].'</option>';

				}
				?>
			
			</select>

<?php else: ?>

	<img src="img/pequeno-loader.gif">Selecione um estado
<?php endif; ?>