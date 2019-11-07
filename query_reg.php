<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar posição</title>
</head>
<body>
	<?php
		//AREA DESTINADA A ARMAZENAR E PROCESSAR TODOS OS DADOS RELACIONADOS A FINALIZAÇÃO
		if(isset($_POST['bt_finali_guard'])){
			$tam_passos=$_POST['tam_passos'];
			$guarda=str_replace("-", " ", $_POST['rec']);
			print "Finalização partindo da <b>$guarda</b><br><br>";
			print "Passos: <b>$tam_passos</b><br><br>";
			print "
			<form method='POST' action='http://localhost/projeto_jiu/registro_position.php?type_finaliza=finali_guard&bt_type_finaliza=Pronto'>
				<input type='submit' name='bt_edit_passos' value='Editar informações'>
			</form>";
			print "<h1>Cadastrar posição</h1>";
			
	?>
		<form method="POST">
			<input type="text" name="name_position" placeholder="Nome da posição" enctype='multipart/form-data'>
			<br><br>
			
	<?php
			$x=0;
			while ($x<$tam_passos) {
				$x++;
				$posi="posi".$x;
				$arquivo="arquivo_".$x;
				$num=$x."º";
				print "<br><br><input type='text' name='$posi' placeholder='Digite o $num passo'>
				<input type='file' name='$arquivo' required>";
			}			
	?>
			<br><br>
			<input type="submit" name="bt_cad_finali" value='Cadastrar'>
		</form>
	<?php
		}elseif(isset($_POST['bt_cad_finali'])){
			if(isset($_FILES['arquivo_1'])){
				print "chegou";
				$extensao=strtolower(substr($_FILES['arquivo']['name'], -4));// pega a extensao do arquivo;
				$novo_nome= md5(time()).$extensao;
				//criando diretorio para armazenar o arquivo (diretorio recebe o nome do arquivo)
				$caminho="/opt/lampp/htdocs/projeto_jiu/positions/"."POSITION_".$novo_nome;
				mkdir($caminho);

			}
		}
		//ACABA AQUI A AREA RELACIONADA A FINALIZAÇÃO
	?>	
</body>
</html>