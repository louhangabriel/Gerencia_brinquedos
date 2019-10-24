<?php
	include "conexao.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar um novo brinquedo</title>
</head>
<body>
	<?php
		if(isset($_POST['bt'])){
			$brinquedo=$_POST['nome_brinquedo'];
			$qt_brinquedo=$_POST['qt_brinquedo'];
			$qt_monitores=$_POST['qt_monitores'];
			$preco=$_POST['preco'];
			$cad=mysqli_query($con, "INSERT INTO brinquedos_cadastrados (brinquedo, estoque, qt_monitores, valor_hr, qt_disponivel)values('$brinquedo', '$qt_brinquedo', '$qt_monitores', '$preco', '$qt_brinquedo')");
			print "BRINQUEDO CADASTRADO COM SUCESSO!";
		}
	?>
	<form method="POST">
		<input type='text' name='nome_brinquedo' placeholder='Nome do Brinquedo' required><br><br>
		<input type='number' name='qt_brinquedo' placeholder="Quantidade em estoque" required><br><br>
		<input type='number' name='qt_monitores' placeholder='Monitores necessarios para cada brinquedo' required><br><br>
		<input type='number' name="preco" placeholder="Valor do aluguel por HORA"><br><br>
		<input type="submit" name="bt" value="Cadastrar">
	</form>
</body>
</html>