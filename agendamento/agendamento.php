<?php

ini_set('display_errors', 1);
$host = "localhost";
$user= "root";
$pass = "";
$banco = "bd_agenda_lab";
 
$con = new mysqli($host, $user, $pass, $banco);
  
if($con->connect_errno)
{
echo"Falha na conexao";
}else{
	//echo"Funcionou";
}

$query = mysqli_query($con, "SELECT * FROM tb_laboratorio");
$query_professor = mysqli_query($con, "SELECT * FROM tb_professor");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Agendamento</title>
	<link href="../estilos/estilo.css" rel="stylesheet">
	<?php require '../estilos/bootstrap.php' ?>
	<?php require '../estilos/menu.php' ?>
</head>


<body>


<div class="container">
		<form id="form_agendamento" autocomplete="off" name="form_agendamento" method="post" action="../validacao/recebe_form_agendamento.php">
			<div class="grid text-center">
       			<legend>Agendamento</legend>
       		</div>
			
			<div class="form-group">
        		<div class="col-md-6 offset-md-3">
        	<label>Data:</label>
        		<input class="form-control" type="date" name="data_agendamento" value='<?php echo date("Y-m-d"); ?>' required ><br>
        	</div>
        </div>
        	<div class="row gx-6">
        	
        		<div class="col-md-3 offset-md-3">
				<label>Hora início</label> 
        		<select class="form-select" name="hora_inicio" id="dropHrInicio" >
  					<option value="8">08h</option>
 					<option value="9">09h</option>
 					<option value="10">10h</option>
 					<option value="11">11h</option>
 					<option value="13">13h</option>
 					<option value="14">14h</option>
 					<option value="15">15h</option>
 					<option value="16">16h</option>
				</select> 

        		</div>
        	
        		<div class="col-md-3">
				<label>Hora Fim</label>
				<select class="form-select" name="hora_fim" id="dropHrFim" >
 					<option value="9">09h</option>
 					<option value="10">10h</option>
 					<option value="11">11h</option>
 					<option value="12">12h</option>
 					<option value="13">13h</option>
 					<option value="14">14h</option>
 					<option value="15">15h</option>
 					<option value="16">16h</option>
 					<option value="17">17h</option>
				</select> <br>
        			
        	
        	</div>

        </div>
        	<div class="form-group">
        		<div class="col-md-6 offset-md-3">

        			<label for="lab">Escolha o Laboratório: </label>
					<select class="form-select" name="labs" id="dropLab" >
  					<option>Selecione... </option>
  				<?php while($prod = mysqli_fetch_array($query)) { ?>
 					<option value="<?php echo $prod['id_laboratorio'] ?>"><?php echo $prod['nome_laboratorio'] ?></option>
 				<?php } ?>
			</select> <br>
        		</div>
        	</div> 

        	<div class="form-group">
        		<div class="col-md-6 offset-md-3">
        			<label for="lab">Escolha o professor: </label>
					<select class="form-select" name="prof" id="dropProf">
  					<option>Selecione... </option>
  				<?php while($prod = mysqli_fetch_array($query_professor)) { ?>
 					<option value="<?php echo $prod['id_professor'] ?>"><?php echo $prod['nome_professor'] ?></option>
 				<?php } ?>
			</select> <br>
        			
        		</div>
        	</div> 

			
			<div class="grid text-center">
            	<div class="col-md-6 offset-md-3">
                	<input type="submit" value="Agendar" class="btn btn-success" name="">
            	</div>
        	</div>
  
		</form>
	</div>
</div>
</body>
</html>


