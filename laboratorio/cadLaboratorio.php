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


<div class="container">
		<form id="form_professor" autocomplete="off" name="form_professor" method="post" action="../validacao/recebe_form_cadLaboratorio.php">
			<div class="grid text-center">
				<legend>Laboratório</legend>
			</div>
			
        	<div class="form-group">
        		<div class="col-md-6 offset-md-3">
        			<label>Nome:</label>
        			<input class="form-control" type="text" name="nome_laboratorio" placeholder="Biologia">  
        		</div>
        	</div> <br>
        	<div class="grid text-center">
            	<div class="col-md-6 offset-md-3">
                	<input type="submit" value="Cadastrar" class="btn btn-success" name="">
            	</div>
        	</div>
        	
		</form>
	</div>
</body>
</html>
