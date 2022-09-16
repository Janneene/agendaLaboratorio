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
	<title>Relatório</title>
	<link href="../estilos/estilo.css" rel="stylesheet">
	<?php require '../estilos/bootstrap.php' ?>
	<?php require '../estilos/menu.php' ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
  			$('#escondido').hide();
  			$('#escondido2').hide();
  			$('#mySelect').change(function() {
    			if ($('#mySelect').val() == 'mes') {
      			$('#escondido').show();
      			$('#escondido2').show();
    			} else {
      			$('#escondido').hide();
      			$('#escondido2').hide();
    			}
  			});
		});

	</script>
</head>
<body>

<!-- 
<div class="form-group">
        		<div class="col-md-6 offset-md-3">

        			
        		</div>
        	</div> 
-->

<div class="container">
		<form id="form_agendamento" autocomplete="off" name="form_agendamento" method="post" action="../validacao/recebe_form_relatorio.php">
			<div class="grid text-center">
       			<legend>Relatório</legend>
        	</div>

        	<div class="form-group">
        		<div class="col-md-6 offset-md-3">
        			<label for="lab">Escolha o Laboratório: </label>
					<select class="form-select" name="laboratorio" id="dropLab" >
  					<option>Selecione... </option>
  				<?php while($prod = mysqli_fetch_array($query)) { ?>
 					<option value="<?php echo $prod['nome_laboratorio'] ?>"><?php echo $prod['nome_laboratorio'] ?></option>
 				<?php } ?>
			</select> <br>
        			
        		</div>
        	</div>
        	
        	<div class="form-group">
        		<div class="col-md-6 offset-md-3">

        			<label>Escolha o período</label>
			<select id="mySelect" name="periodo" class="form-select">
  				<option value="ano">Este ano</option>
  				<option value="mes">Por mês</option>
  				<option value="semana">Esta semana</option>
			</select> <br>
        		</div>
        	</div> 
			<div class="form-group">
        		<div class="col-md-6 offset-md-3">

        			<label id="escondido">Escolha o mês:</label>
				<select name="mes" id="escondido2"  class="form-select">
 					<option value="1">Janeiro</option>
					<option value="2">Fevereiro</option>
					<option value="3">Março</option>
					<option value="4">Abril</option>
					<option value="5">Maio</option>
					<option value="6">Junho</option>
					<option value="7">Julho</option>
					<option value="8">Agosto</option>
					<option value="9">Setembro</option>
					<option value="10">Outubro</option>
					<option value="11">Novembro</option>
					<option value="12">Dezembro</option>
				</select> <br>
        		</div>
        	</div>

			
<div class="grid text-center">
            	<div class="col-md-6 offset-md-3">
			<input class="btn btn-success" type="submit" value="Relatório" >
    		</div>
        	</div>
		</form>
	
</div>


</body>
</html>
