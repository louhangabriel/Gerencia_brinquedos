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
					
					print "
					<tr>
							<td><center>$recebe[1]</center></td>
							<td><center>$recebe[2]</center></td>
							<td><center>$recebe[3]</center></td>
							<td><center>$recebe[4]</center></td>
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