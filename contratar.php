<?php
	include "conexao.php";
	include "functions_contract.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contratar</title>
	<meta charset="utf-8">
	<style type="text/css">
		input[type=number]::-webkit-inner-spin-button { 
    	-webkit-appearance: none;    
		}
		input[type=number] { 
   			-moz-appearance: textfield;
   			appearance: textfield;
   		}
   		.tel{width: 200px; height: 13px}
	</style>
</head>
<body>
	<?php
		if(isset($_POST['bt_solicitar'])){
			$name_client=$_POST['name'];
			$local_event=$_POST['local'];
			$contact=$_POST['telefone'];
			$date_event=$_POST['data_evento'];
			$start_event=str_replace(":", ".", $_POST['inicio_time']);
			$duration_event=str_replace(":", ".", $_POST['duracao_time']);
			//PAREI AQUI (TRANSFORMEI STRING EM FORMATO DOUBLE) QUERO CALCULAR QUE HORAS TERMINA O EVENTO DE ACORDO COM O HORARIO QUE COMEÇA E QUANTAS HORAS DE EVENTO
			print $start_event=(float)$start_event."<br>";	
			print $duration_event."<br>";
			print $start_event-$duration_event;
			$x=4;
			$brinquedo=" ";
			//Obtendo o nome dos brinquedos selecionados por meio de um FOR
			for($x=0; $x!=4; $x++){
				$y="$x";
				if(isset($_POST[$x])){
					$brinquedo=$_POST[$x]."/".$brinquedo;
				}
			}
			$importar=import_pendentes("$name_client", "$local_event", "$contact", "$date_event", "$start_event", "$duration_event", "$brinquedo");
		}
	?>
	<form method='POST' name='contratar'>
		<input type='text' name='name' placeholder='Digite seu nome e sobrenome' required><br><br>
		<input type='text' name='local' placeholder='Digite o Local do evento' required><br><br>
		<input type='number' name='telefone' placeholder='Telefone para contato' class='tel' required><br>
		<p>Selecione o(s) brinquedo(s) que <b>deseja</b>:</p>
		<input type='checkbox' name='0' value='touro'>Touro mecânico<br>
		<input type='checkbox' name='1' value='futebol_de_sabao'>Futebol de sabão<br>
		<input type='checkbox' name='2' value='jacare'>Jacaré<br>
		<input type='checkbox' name='3' value='piscina'>Piscina de bolinhas<br>
		<p>Informe qual data ocorrera o evento:</p>
		<input type='date' name='data_evento' required><br><br>
		<p>Informe que horário ira <b>iniciar</b> o evento:</p>
		<input type='time' name='inicio_time' required><br><br>
		<p>Por <b>quanto tempo</b> deseja ter nosso serviço em seu evento:</p>
		<input type='time' name='duracao_time' required><br><br>
		<input type='submit' name='bt_solicitar' value='Solicitar'>
	</form>
</body>
</html>