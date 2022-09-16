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

	<div class="container">
		<form id="form_professor" autocomplete="off" name="form_professor" method="post" action="../validacao/recebe_form_cadProfessor.php">
			<div class="grid text-center">
				<legend>Professor</legend>
			</div>
			<div class="form-group">
        		<div class="col-md-6 offset-md-3">
        			<label>Nome:</label>
        			<input class="form-control" type="text" name="nome_professor" placeholder="Fulano de tal" > 
        		</div> 
        	</div>
        	<div class="form-group">
        		<div class="col-md-6 offset-md-3">
        			<label>Matrícula:</label>
        			<input class="form-control" type="text" name="matricula" placeholder="1111111">  
        		</div>
        	</div>
        	<div class="form-group">
        		<div class="col-md-6 offset-md-3">
        			<label>Telefone:</label>
        			<input class="form-control" type="text" name="telefone" placeholder="(69)99999-8888">  
        		</div>
        	</div> <br>
        	<div class="grid text-center">
            	<div class="col-md-6 offset-md-3">
                	<input type="submit" value="Cadastrar" class="btn btn-success" name="">
            	</div>
        	</div>
        	
		</form>
	</div>
</div>


</body>
</html>
