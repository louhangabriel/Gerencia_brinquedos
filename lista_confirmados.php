<?php
	include "conexao.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>.::Lista de Confirmados::.</title>
</head>
<body>	
	<center><h1><b>EVENTOS CONFIRMADOS</b></h1></center>
	<br>
		<?php
			
			//INICIO CONFIRMADOS		
			$export=mysqli_query($con, "SELECT * FROM confirmados");
			$tam=mysqli_num_rows($export);
			if($tam>0){
		?>
	<center>
		<table border='1px'>
			<tr>
				<td><b><center>Nome do(a) contratante</center></b></td>
				<td><b><center>Local</center></b></td>
				<td><b><center>Contato</center></b></td>
				<td><b><center>Data do evento</center></b></td>
				<td><b><center>Hora inicio</center></b></td>
				<td><b><center>Tempo de evento</center></b></td>
				<td><b><center>Brinquedo(s)</center></b></td>
			</tr>
			<?php

				$x=0;
				while ($recebe=mysqli_fetch_row($export)) {
					$recebe[7]=str_replace('_', ' ', $recebe[7]);
					$recebe[4]=str_replace('-', '/', $recebe[4]);	
					$date_rec=explode("/", $recebe[4]);		
					$data=$date_rec[2]."/".$date_rec[1]."/".$date_rec[0];
					print $hr=date("H")-4 .":".date("i").":".date("s");
					if ($hr >=18) {
						$hr="Boa noite!";
					}
					elseif ($hr <= 12) {
						$hr="Bom dia!";
					}
					elseif($hr >= 12){
						$hr= "Boa tarde!";
					}
					$msg="$hr $recebe[1], seu evento foi confirmado! *Contratante*: $recebe[1] *Local*: $recebe[2]  *Contato*: $recebe[3] *Data*: $data *Começa ás: *: $recebe[5] *Duração: *: $recebe[6] *Brinquedos*: $recebe[7]"; 
					print "
					<tr>
							<td><center>$recebe[1]</center></td>
							<td><center>$recebe[2]</center></td>
							<td><center><a href='https://api.whatsapp.com/send?l=pt_BR&phone=5585$recebe[3]&text=$msg' target='_blank'>$recebe[3]</a></center></td>
							<td><center>$data</center></td>
							<td><center>$recebe[5]</center></td>
							<td><center>$recebe[6]</center></td>
							<td><center>$recebe[7]</center></td>
					</tr>	";

					
				}
			}else{
				print "<h3><center>Total: <b>$tam</b> eventos encontrados! </center></h3>";
			}
		?>
		</table>
	</center>
</body>
</html>