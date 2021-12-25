	<?php
	require_once('../dao/Conexao.php'); 
	require '../dao/DAOProfissional.php';
	require '../dao/DAOProfissao.php';
	require '../model/ProfissaoModel.php';
	require '../model/EstadoModel.php';
	require '../dao/DAOCidade.php';
	require '../dao/DAOEstado.php';
	require '../model/ProfissionalModel.php';


	$cod = $_POST['tipoProfissional'];

	if(!empty($cod)):
	$daoProfissional = new DAOProfissional();


	?>

	<select style="font-family: inherit;  height: 30px; width: 100%; " id="profissional" name="profissional">
					<option value="">
						Selecione
					</option>

					<?php 
					$result = $daoProfissional->listaPorIdProfissao($cod) ;
					print_r($result);

					if ($result === null) {
						echo "vaziaaa";
						
						?>
						<small>
							Não há profissional dessa profissão cadastrado
						</small>

						<?php
					}else{
						
						foreach ($result as $row){
							?>
						<option value=' <?php echo $row['idProfissional'] ?>'><?php echo $row['nome'] ; echo ' ' ; echo $row['sobrenome'];?></option>';
							
							<?php
						}
					}
					?>
				
				</select>

	<?php else: ?>

		<img src="img/pequeno-loader.gif">Selecione um estado
	<?php endif; ?>