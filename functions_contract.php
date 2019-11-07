<?php
	include "conexao.php";

	function import_pendentes($name, $local, $contato, $date, $inicio_hour, $total_time, $brinquedo,$qt_brinquedos){
		include "conexao.php";
		$import=mysqli_query($con, "INSERT INTO pendentes (nome, local_evento, contato, data_inicio, inicio_evento, tempo_evento, brinquedo, quantidade)
			values('$name', '$local', '$contato', '$date', '$inicio_hour', '$total_time', '$brinquedo','$qt_brinquedos')");
	}

	//Função reservada para calcular diferença de horas e dias
	function horas_diferenca($hora1, $minuto1, $hora2, $minuto2,$data){
		include "conexao.php";	
			//Array com total de dias de cada mes
			$meses=array("Meses do ano",31,29,31,30,31,30,31,31,30,31,30,31);
			//Calculando as horas e minutos
			$horas = $hora1 + $hora2;
			$minutos = $minuto1 + $minuto2;
			while ($minutos > 59) {
					$minutos = $minutos-60;
					$horas++;
				}
				$hora_final=floatval($horas.".".$minutos);
				if($hora_final >= 24){
					//Transformando a hora em formato 00:00
					$hora_final=$hora_final - 24;
					$add_zero=explode(".", $hora_final);
					if($add_zero[0] < 10){
						$min=$add_zero[1];
						$add_zero[0]="0".$add_zero[0];
						$hora_final=$add_zero[0].":".$min;
					}
					$hora_final=str_replace(".", ":", $hora_final);
					
					//Formatando data
					$data=explode("/", $data);
					$data[1]=str_replace("0", "", $data[1]);
					//Verificando se o total de dias do mes é igual o dia atual e o ano for igual a 12 
					if(($total_dias=$meses[$data[1]] == $data[0]) && ($data[1] == "12")){
						//transformando o ano de string para inteiro
						$ano=intval($data[2]);
						$ano++;
						$nova_data="01/01/$ano";
						return array($hora_final, $nova_data);
					}elseif ($total_dias=$meses[$data[1]] == $data[0]) {
						//Transformando mes e ano de string para inteiro e icrementando mes
						$ano=intval($data[2]);
						$mes=intval($data[1])+1;
						$nova_data="01/$mes/$ano";
						return array($hora_final, $nova_data);
					}elseif ($total_dias=$meses[$data[1]] > $data[0]){
						$dia=intval($data[0])+1;
						$nova_data="$dia/$data[1]/$data[2]";
						return array($hora_final, $nova_data);
					}else{
						return array($hora_final, "/NN/");
					}
				}else{
					//SE A HORA NAO FOR MAIOR QUE 24H Retornar a hora atualizada com a mesma data de hoje

					//Transformando a hora em formato 00:00
					$add_zero=explode(".", $hora_final);
					if($add_zero[0] < 10){
						$min=$add_zero[1];
						$add_zero[0]="0".$add_zero[0];
						$hora_final=$add_zero[0].":".$min;
					}
					$hora_final=str_replace(".", ":", $hora_final);
					return array($hora_final, $data);	
				}
		}
			
	$teste=horas_diferenca(10,35,4,3,"20/11/2019");
	print $teste[1];
?>