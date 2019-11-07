<?php
	function confirmar_evento($name, $local, $contato, $date, $inicio_hour, $total_time, $brinquedo, $qt_brinquedos){
		include "conexao.php";
		$import=mysqli_query($con, "INSERT INTO confirmados (nome, local_evento, contato, data_inicio, inicio_evento, tempo_evento, brinquedo, quantidade)
			values('$name', '$local', '$contato', '$date', '$inicio_hour', '$total_time', '$brinquedo','$qt_brinquedos')");
	}
?>