<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laboratório</title>
	<link href="../estilos/estilo.css" rel="stylesheet">
	<?php require '../estilos/bootstrap.php' ?>
	<?php require '../estilos/menu.php' ?>
</head>
<body>


<div class="grid text-center">
	<div class="g-col-6">
		<form id="form_agendamento" autocomplete="off" name="form_agendamento" method="post" action="../validacao/recebe_form_cadLaboratorio.php">
			<fieldset>
       		<legend>Laboratório</legend>
        	<label>Nome:</label><input class="campo_nome" type="text" name="nome_laboratorio" placeholder="Informática B" ><br>

        	<input class="btn_submit" type="submit" value="Cadastrar" >
    		</fieldset>
		</form>
	</div>
</div>


</body>
</html>
