<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Professor</title>
	<link href="../estilos/estilo.css" rel="stylesheet">
	<?php require '../estilos/bootstrap.php' ?>
	<?php require '../estilos/menu.php' ?>
</head>
<body>
<div class="grid text-center">
	<div class="g-col-6">
		<form id="form_professor" autocomplete="off" name="form_professor" method="post" action="../validacao/recebe_form_cadProfessor.php">
			<fieldset>
       		<legend>Professor</legend>
        	<label>Nome:</label><input class="campo_nome" type="text" name="nome_professor" placeholder="Fulano de tal" ><br>
        	<label>Matrícula:</label><input type="text" name="matricula" placeholder="1111111"> <br>
        	<label>Telefone:</label><input type="text" name="telefone" placeholder="(69)99999-8888"> <br>
        	<input class="btn_submit" type="submit" value="Cadastrar" >
    		</fieldset>
		</form>
	</div>
</div>
</body>
</html>
