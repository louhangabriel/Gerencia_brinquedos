<?php
	include "functions_contract.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notificação</title>
</head>
<body>
	<?php
		if(isset($_POST['bt_solicitar'])){
			$name_client=$_POST['name'];
			$local_event=$_POST['local'];
			$contact=$_POST['telefone'];
			$date_event=$_POST['data_evento'];
			$dt=explode("-", $date_event);
			$data=$dt[2]."/".$dt[1]."/".$dt[0];
			$start_event=explode(":", $_POST['inicio_time']);
			$duration_event=explode(":", $_POST['duracao_time']);
			//variaveis para cadastrar no banco;
			$inicio_evento=$_POST['inicio_time'];
			$duracao=$_POST['duracao_time'];
			//Quebrando horas em numeros inteiros
			$int_inicio_hr=intval($start_event[0]);
		 	$int_inicio_min=intval($start_event[1]);
			$int_duration_hr=intval($duration_event[0]);
			$int_duration_min=intval($duration_event[1]);
			//Usando a função horas_diferenca(); para hora final do evento
			$hora_final_evento=horas_diferenca($int_inicio_hr, $int_inicio_min, $int_duration_hr, $int_duration_min, $data);
			print $hora_cad=$hora_final_evento[0];
			print "<br>";
			print $data_cad=$hora_final_evento[1];
			$x=4;
			$brinquedo="";
			//Obtendo o nome dos brinquedos selecionados por meio de um FOR
			for($x=0; $x!=4; $x++){
				$y="$x";
				if(isset($_POST[$x])){
					$brinquedo=$_POST[$x]."/".$brinquedo;
				}
			}
			//OBTENDO A QUANTIDADE DE BRINQUEDOS SELECIONADOS
				$brinquedos_selecionados=$brinquedo;
				$arr=explode("/", $brinquedos_selecionados);
				$total_brinquedos=count($arr)-1;
	
			$inserir=mysqli_query($con, "INSERT INTO (nome, local_evento, contato, data_inicio, inicio_evento, tempo_evento, brinquedo, quantidade, data_final, final_evento) values('$name_client', '$local_event', '$contact', '$data', '$inicio_evento', '$duracao', '$brinquedo', '$total_brinquedos', '$data_cad', '$hora_cad')");
			
				print "<h1>Sua solicitação foi enviada com sucesso!</h1>";
				print "<p><b>Contratante: </b> $name_client <br><b>Local: </b>$local_event <br><b>Data: </b>$data<br><b>Começa ás: </b>$inicio_evento<br><b>Duração: </b>$duracao<br><b>Brinquedos: </b>$brinquedo</p>";
			
		}
	?>
</body>
</html>