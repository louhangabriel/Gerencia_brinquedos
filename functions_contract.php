<?php
	include "conexao.php";

	function import_pendentes($name, $local, $contato, $date, $inicio_hour, $total_time, $brinquedo){
		include "conexao.php";
		$import=mysqli_query($con, "INSERT INTO pendentes (nome, local_evento, contato, data_inicio, inicio_evento, tempo_evento, brinquedo)
			values('$name', '$local', '$contato', '$date', '$inicio_hour', '$total_time', '$brinquedo')");
	}


?>