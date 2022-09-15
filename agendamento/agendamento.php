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


<div class="grid text-center">
	<div class="g-col-6">
		<form id="form_agendamento" autocomplete="off" name="form_agendamento" method="post" action="../validacao/recebe_form_agendamento.php">
			<fieldset>
       		<legend>Agendamento</legend>
        	<label>Data:</label><input class="campo_nome" type="date" name="data_agendamento" value='<?php echo date("Y-m-d"); ?>' required ><br>

        	<label>Hora início</label> 
        		<select name="hora_inicio" id="dropHrInicio" >
  					<option value="8">08h</option>
 					<option value="9">09h</option>
 					<option value="10">10h</option>
 					<option value="11">11h</option>
 					<option value="13">13h</option>
 					<option value="14">14h</option>
 					<option value="15">15h</option>
 					<option value="16">16h</option>
				</select> <br>


        	<label>Hora Fim</label>
				<select name="hora_fim" id="dropHrFim" >
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




        	<label for="lab">Escolha o Laboratório: </label>
			<select name="labs" id="dropLab" >
  				<option>Selecione... </option>
  				<?php while($prod = mysqli_fetch_array($query)) { ?>
 					<option value="<?php echo $prod['id_laboratorio'] ?>"><?php echo $prod['nome'] ?></option>
 				<?php } ?>
			</select> <br>

			<label for="lab">Escolha o professor: </label>
			<select name="prof" id="dropProf">
  				<option>Selecione... </option>
  				<?php while($prod = mysqli_fetch_array($query_professor)) { ?>
 					<option value="<?php echo $prod['id_professor'] ?>"><?php echo $prod['nome'] ?></option>
 				<?php } ?>
			</select> <br>




        	<input class="btn_submit" type="submit" value="Agendar" >
    		</fieldset>
		</form>
	</div>
</div>
</body>
</html>


