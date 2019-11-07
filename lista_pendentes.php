<?php
	include "functions_listas.php"; 
	print $h="10:00:00";

?>
<!DOCTYPE html>
<html>
<head>
	<title>.::Eventos pendentes::.</title>
	<style type="text/css">
		.bts{width: 20px}
		#confirmar_event{position: relative;top:70px;width: 70px; left: 570px}
		#cancelar_event{position: relative;top:70px;width: 50px; left: 640px}
		.info{font-size: 30px}
	</style>
</head>
<body>
	<?php
	include "conexao.php";

	//CHECANDO SE RECEBEU OS DADOS PENDENTES PARA APROVAÇÃO
			if(isset($_GET['confirmar_evento'])){
				$id=$_GET['id'];
				$nome=$_GET['name'];
				$local=$_GET['local'];
				$contato=$_GET['contato'];
				$data=$_GET['dt'];
				$inicio=$_GET['inicio'];
				$tempo=$_GET['time'];
				$brinquedos=$_GET['brinquedos'];
				print "<h1><center>Antes de confirmar der uma ultima olhada nos detalhes do evento!</center></h1>";
				print "<center><h2>Detalhes do evento</h2></center>";
				print "<center class='info'><b>Contratante:</b> $nome<br><b>Local: </b>$local<br><b>Contato: </b>$contato<br><b>Data: </b>$data<br><b>Inicio do evento ás: </b>$inicio<br><b>Duração: </b>$tempo<br><b>Brinquedos: </b>$brinquedos</center>";
				print "<a href='http://localhost/Gerencia_brinquedos/lista_pendentes.php?name=$nome&local=$local&contato=$contato&dt=$data&inicio=$inicio&time=$tempo&brinquedos=$brinquedos&bt_confirmar_evento=true&id=$id'><img src='confirmar_evento.png' id='confirmar_event'></a>";
				print "<a href='http://localhost/Gerencia_brinquedos/lista_pendentes.php'><img src='voltar.png' id='cancelar_event'></a>";
			}elseif(isset($_GET['cancelar_evento'])){
				$id=$_GET['id'];
				$nome=$_GET['name'];
				$local=$_GET['local'];
				$contato=$_GET['contato'];
				$data=$_GET['dt'];
				$inicio=$_GET['inicio'];
				$tempo=$_GET['time'];
				$brinquedos=$_GET['brinquedos'];
				print "<h1><center>TEM CERTEZA QUE DESEJA CANCELAR ESTE EVENTO?</center></h1>";
				print "<center><h2>Detalhes do evento</h2></center>";
				print "<center class='info'><b>Contratante:</b> $nome<br><b>Local: </b>$local<br><b>Contato: </b>$contato<br><b>Data: </b>$data<br><b>Inicio do evento ás: </b>$inicio<br><b>Duração: </b>$tempo<br><b>Brinquedos: </b>$brinquedos</center>";
				print "<a href='http://localhost/Gerencia_brinquedos/lista_pendentes.php?name=$nome&local=$local&contato=$contato&dt=$data&inicio=$inicio&time=$tempo&brinquedos=$brinquedos&bt_cancelar_evento=true&id=$id'><img src='lixeira.png' id='confirmar_event'></a>";
				print "<a href='http://localhost/Gerencia_brinquedos/lista_pendentes.php?'><img src='voltar.png' id='cancelar_event'></a>";
			}
			
	elseif(isset($_GET['bt_cancelar_evento'])){
				$id=$_GET['id'];
				$nome=$_GET['name'];
				$local=$_GET['local'];
				$contato=$_GET['contato'];
				$data=$_GET['dt'];
				$inicio=$_GET['inicio'];
				$tempo=$_GET['time'];
				$brinquedos=$_GET['brinquedos'];
				$cancel=mysqli_query($con,"DELETE FROM pendentes where id='$id'");
				if($cancel){
					print "<center>O evento com o(a) contratante(a): <b>$nome</b> foi CANCELADO com sucesso!!<br>O contratante sera notificado por email.</center>";
				}
			}
	elseif(isset($_GET['bt_confirmar_evento'])){
				print $id=$_GET['id'];
				$nome=$_GET['name'];
				$local=$_GET['local'];
				$contato=$_GET['contato'];
				$data=$_GET['dt'];
				$inicio=$_GET['inicio'];
				$tempo=$_GET['time'];
				$brinquedos=$_GET['brinquedos'];
				//RESOLVER PROBLEMA APARTIR DAQUI
				$confirm=mysqli_query($con, "INSERT INTO confirmados (nome, local_evento, contato, data_inicio, inicio_evento, tempo_evento, brinquedo) values('$nome', '$local', '$contato', '$data', '$inicio', '$tempo', '$brinquedos')");
				if($confirm){
					mysqli_query($con,"DELETE FROM pendentes where id='$id'");	
					header("location:http://localhost/Gerencia_brinquedos/lista_confirmados.php");
				}else{
					print "Não foi possivel Confirmar este evento! Certifique-se se já não confirmou ele em outro momento.";
				}
	
	
			}
			else{
?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>.::Eventos pendentes.::</title>
	<style type="text/css">
		.bts{width: 20px}
		.confirmar_event{width: 40px}
	</style>
</head>
<body>
	<h1><center>Lista de eventos aguardando aprovação</center></h1>
	
		
		<?php
			
			$export=mysqli_query($con, "SELECT * FROM pendentes");
			$tam=mysqli_num_rows($export);
			if($tam>0){
		?>			
			
		<table name='lista_pendentes'  border='1'>
		<tr>
			<td><center><b>ID</b></center></td>
			<td><b><center>Nome do(a) contratante</center></b></td>
			<td><b><center>Local</center></b></td>
			<td><b><center>Contato</center></b></td>
			<td><b><center>Data do evento</center></b></td>
			<td><b><center>Hora inicio</center></b></td>
			<td><b><center>Tempo de evento</center></b></td>
			<td><b><center>Brinquedo(s)</center></b></td>
			<td><b><center>CONFIRMAR</center></b></td>
			<td><b><center>REJEITAR</center></b></td>

		</tr>

			<?php

				$x=0;
				while ($recebe=mysqli_fetch_row($export)) {
					$recebe[7]=str_replace('_', ' ', $recebe[7]);
					$recebe[4]=str_replace('-', '/', $recebe[4]);			
					
					print "
					<tr>
							<td><center>$recebe[0]</center></td>
							<td><center>$recebe[1]</center></td>
							<td><center>$recebe[2]</center></td>
							<td><center>$recebe[3]</center></td>
							<td><center>$recebe[4]</center></td>
							<td><center>$recebe[5]</center></td>
							<td><center>$recebe[6]</center></td>
							<td><center>$recebe[7]</center></td>
							<td><center><a href='http://localhost/Gerencia_brinquedos/lista_pendentes.php?confirmar_evento=true&name=$recebe[1]&local=$recebe[2]&contato=$recebe[3]&dt=$recebe[4]&inicio=$recebe[5]&time=$recebe[6]&brinquedos=$recebe[7]&id=$recebe[0]'><img src='confirm.png' class='bts'></a></center></td>
							<td><center><a href='http://localhost/Gerencia_brinquedos/lista_pendentes.php?cancelar_evento=true&&name=$recebe[1]&&local=$recebe[2]&&contato=$recebe[3]&&dt=$recebe[4]&&inicio=$recebe[5]&&time=$recebe[6]&&brinquedos=$recebe[7]&&id=$recebe[0]'><img src='rejeitar.png' class='bts'></a></center></td>
					</tr>	";

					
				}
			}else{
				print "<h3><center>Total: <b>$tam</b> eventos encontrados! </center></h3>";
			}
		?>
		
	</table>
</body>
</html>
<?php
	}
?>