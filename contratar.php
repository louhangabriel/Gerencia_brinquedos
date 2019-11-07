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
	<form method='POST' name='contratar' action="notification.php">
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