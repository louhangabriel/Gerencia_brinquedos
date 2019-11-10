<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar posição</title>
</head>
<body>
	<?php
		//Recebendo o tipo de finalização
		if(isset($_GET['bt_type_finaliza'])){
			if($_GET['type_finaliza']=="finali_guard"){
	?>	
			<h2>Guarda usada:</h2>
			<form name="form_finali_raspagem" method="POST" action="query_reg.php">
				
				<select name='rec'>
					<option value="Guarda-aberta">Guarda aberta</option>
					<option value="Guarda-fechada">Guarda fechada</option>
					<option value="Meia-guarda">Meia-guarda</option>
					<option value="Guarda-aranha">Guarda aranha</option>
					<option value="Guarda-alta">Guarda alta</option>
					<option value="Guarda-de-la-riva">Guarda De La Riva</option>
					<option value="Guarda-x">Guarda X</option>
					<option value="Guarda-borboleta">Guarda Borboleta (Sentada)</option>
					<option value="Guarda-emborcada">Guarda emborcada</option>
					<option value="Guarda-cruzada">Guarda cruzada</option>
					<option value="Guarda-invertida">Guarda invertida</option>
				</select>
				<br><br>
				<input type="number" name="tam_passos" placeholder="Total passo a passo" required>
				<br><br>
				<input type="submit" name="bt_finali_guard" value="Pronto">
			</form>
	<?php
		}elseif($_GET['type_finaliza']=="finali_pass"){

	?>
		<form name="form_finali_passagem" method="POST">
				<select>
					<option value="guarda-aberta">PASSAGEM da Guarda aberta</option>
					<option value="guarda-fechada">PASSAGEM da Guarda fechada</option>
					<option value="meia-guarda">PASSAGEM da Meia-guarda</option>
					<option value="guarda-aranha">PASSAGEM da Guarda aranha</option>
					<option value="guarda-alta">PASSAGEM da Guarda alta</option>
					<option value="guarda-de-la-riva">PASSAGEM da Guarda De La Riva</option>
					<option value="guarda-x">PASSAGEM da Guarda X</option>
					<option value="guarda-borboleta">PASSAGEM da Guarda Borboleta (Sentada)</option>
					<option value="guarda-emborcada">PASSAGEM da Guarda emborcada</option>
					<option value="guarda-cruzada">PASSAGEM da Guarda cruzada</option>
					<option value="guarda-invertida">PASSAGEM da Guarda invertida</option>
				</select>
				<br><br>
				<input type="submit" name="bt_opt_pass" value="Pronto">
			</form>
	<?php
		}elseif($_GET['type_finaliza']=="finali_mov"){
	?>

	<?php
		}elseif($_GET['type_finaliza']=="finali_outro"){

	?>

	<?php
		}
	}else{


	?>
	

	<?php
		//Recebendo o tipo de posição 
		if(isset($_POST['bt_type_info'])){
			if($_POST['sel_option']=="raspagem"){

	?>
			<form name="form_raspagem" method="POST">
				<select>
					<option value="guarda-aberta">Guarda aberta</option>
					<option value="guarda-fechada">Guarda fechada</option>
					<option value="meia-guarda">Meia-guarda</option>
					<option value="guarda-aranha">Guarda aranha</option>
					<option value="guarda-alta">Guarda alta</option>
					<option value="guarda-de-la-riva">Guarda De La Riva</option>
					<option value="guarda-x">Guarda X</option>
					<option value="guarda-borboleta">Guarda Borboleta (Sentada)</option>
					<option value="guarda-emborcada">Guarda emborcada</option>
					<option value="guarda-cruzada">Guarda cruzada</option>
					<option value="guarda-invertida">Guarda invertida</option>
				</select>
				<br><br>
				<input type="submit" name="bt_guard" value="Pronto">
			</form>
		<?php
			}
			elseif($_POST['sel_option']=="passagem"){
		?>
				<form name="form_passagem" method="POST">
				<select>
					<option value="guarda-aberta">PASSAGEM da Guarda aberta</option>
					<option value="guarda-fechada">PASSAGEM da Guarda fechada</option>
					<option value="meia-guarda">PASSAGEM da Meia-guarda</option>
					<option value="guarda-aranha">PASSAGEM da Guarda aranha</option>
					<option value="guarda-alta">PASSAGEM da Guarda alta</option>
					<option value="guarda-de-la-riva">PASSAGEM da Guarda De La Riva</option>
					<option value="guarda-x">PASSAGEM da Guarda X</option>
					<option value="guarda-borboleta">PASSAGEM da Guarda Borboleta (Sentada)</option>
					<option value="guarda-emborcada">PASSAGEM da Guarda emborcada</option>
					<option value="guarda-cruzada">PASSAGEM da Guarda cruzada</option>
					<option value="guarda-invertida">PASSAGEM da Guarda invertida</option>
				</select>
				<br><br>
				<input type="submit" name="bt_passagem" value="Pronto">
			</form>
		<?php
			}elseif($_POST['sel_option']=="inversao"){

		?>

		<?php
			}elseif($_POST['sel_option']=="movimentacao"){

		?>

		<?php
			}elseif($_POST['sel_option']=="finalizacao"){

		?>
			<h4>Informe de onde acontece a finalização: </h4>
			<form name="type_finaliza" method="GET">
				<select name="type_finaliza">
					<option value="finali_guard">Finalização partindo da GUARDA</option>
					<option value="finali_pass">Finalização partindo da PASSAGEM</option>
					<option value="finali_mov">Finalização partindo de MOVIMENTAÇÃO</option>
					<option value="finali_outro">OUTRO</option>
				</select>
				<br><br><input type="submit" name="bt_type_finaliza" value="Pronto">
			</form>
		<?php
			}

		}else{
		?>
		<h2>Informe que tipo de posição deseja cadastrar:</h2>
		<form method ="POST" name='tipoo'>
			<select name="sel_option">
				<option value="raspagem">Raspagem</option>
				<option value="passagem">Passagem</option>
				<option value="finalizacao">Finalização</option>
				<option value="inversao">Inversão</option>
				<option value="movimentacao">Movimentação</option>
			</select>
			<br><br><input type="submit" name="bt_type_info" value="Pronto">
		</form>
		<?php
		}
		}
		?>
</body>
</html>