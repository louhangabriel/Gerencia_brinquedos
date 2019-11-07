function horas_diferenca($hora1, $minuto1, $hora2, $minuto2,$data){
		include "conexao.php";
		$date=$data;		
		$data=explode("/", $data);
		$dia_data=$data[0];
		$ano_data=$data[2];
		$data=$data[1];
		
		$number_date=intval(str_replace("0", "", $data));
		//Definindo total de dias de cada mês do ano
		$meses=array("Meses do ano",31,29,31,30,31,30,31,31,30,31,30,31);
		if($total_dias=$meses[$number_date] > 28){
			if($dia_data == $total_dias){
				$horas=$hora1 + $hora2;
				$minutos=$minuto1 + $minuto2;
				if($minutos == 60){
					$horas = $horas + 1; 
					$minutos=0;
					$hora_final="$horas:$minutos";
				}elseif ($minutos > 60) {
					$minutos = $minutos - 60;
					$horas = $horas + 1;
					$hora_final_float="$horas.$minutos";
					$hora_final_float=floatval($hora_final_float);
					$hora_final="$horas:$minutos";
					if($hora_final_float >= 24){
						$data=intval($data) + 1;
						$data="0".$data;
						$nova_data="01/$data/$ano_data";
						array($hora_final, $nova_data);
							
					}
				}