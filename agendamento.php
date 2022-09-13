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
	<link href="estilos/estilo.css" rel="stylesheet">
	<title>Agendamento</title>
</head>


<body>
	<div id="menu">
	<nav>
  		<ul class="menu">
			<li><a href="#">Home</a></li>
			<li><a href="#">Agendamento</a></li>
	  		<li><a href="#">Cadastrar</a>
	         	<ul>
	                  <li><a href="#">Professor</a></li>
	                  <li><a href="#">Laboratório</a></li>
	       		</ul>
			</li>
			<li><a href="#">Relatório</a></li>
<!-- Fim Menu -->
</div> <br><br><br><br><br>

<form id="form_agendamento" autocomplete="off" name="form_agendamento" method="post" action="recebe_form_agendamento.php">
	<fieldset>
        <legend>Agendamento</legend>
        <label>Data:</label><input class="campo_nome" type="date" name="data_agendamento" value='<?php echo date("Y-m-d"); ?>' required ><br>

        <label for="lab">Escolha o Laboratório: </label>

		<select name="labs" id="dropLab">
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
        <input class="btn_submit" type="submit" value="Agendar">
    </fieldset>
</form>
</body>
</html>


