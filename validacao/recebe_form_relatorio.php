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



$laboratorio = $_POST['laboratorio'];
$periodo = $_POST['periodo'];
$mes = $_POST['mes'];
$tamanhoArray = 0;
$data_bd = array();
$arrayProf = array();
$arrayHoraInicio = array();
$arrayHoraFim = array();
$data_hoje = date('Y');
$arrayDataAgendada = array();
$arrayLaboratorio = array();
$data_hoje2 = date('mm/dd/yyyy');	


if ($periodo == 'ano'){
	
	$query_agendamento = mysqli_query($con, "SELECT * FROM tb_agendamento INNER JOIN tb_laboratorio ON tb_agendamento.id_laboratorio = tb_laboratorio.id_laboratorio INNER JOIN tb_professor ON tb_agendamento.id_professor = tb_professor.id_professor WHERE YEAR(tb_agendamento.data_agendamento) = '$data_hoje' AND tb_laboratorio.nome_laboratorio = '$laboratorio'");

	while($prod = mysqli_fetch_array($query_agendamento)){
		
		array_push($arrayLaboratorio, $prod['nome_laboratorio']);
		array_push($arrayProf, $prod['nome_professor']);
		array_push($arrayHoraInicio, $prod['hora_inicio']);
		array_push($arrayHoraFim, $prod['hora_fim']);
		array_push($arrayDataAgendada, $prod['data_agendamento']);
		$tamanhoArray = count($arrayDataAgendada);
		

		
	}
}

if($periodo == 'mes'){
	$query_agendamento = mysqli_query($con, "SELECT * FROM tb_agendamento INNER JOIN tb_laboratorio ON tb_agendamento.id_laboratorio = tb_laboratorio.id_laboratorio INNER JOIN tb_professor ON tb_agendamento.id_professor = tb_professor.id_professor WHERE MONTH(tb_agendamento.data_agendamento) = $mes AND tb_laboratorio.nome_laboratorio = '$laboratorio'");
	
	while($prod = mysqli_fetch_array($query_agendamento)){

		array_push($arrayLaboratorio, $prod['nome_laboratorio']);
		array_push($arrayProf, $prod['nome_professor']);
		array_push($arrayHoraInicio, $prod['hora_inicio']);
		array_push($arrayHoraFim, $prod['hora_fim']);
		array_push($arrayDataAgendada, $prod['data_agendamento']);
		$tamanhoArray = count($arrayDataAgendada);
			
	}
}

$dia_semana = date('z');
$semana = (intval($dia_semana / 7))+1;

if($periodo == 'semana'){
	$query_agendamento = mysqli_query($con, "SELECT * FROM tb_agendamento INNER JOIN tb_laboratorio ON tb_agendamento.id_laboratorio = tb_laboratorio.id_laboratorio INNER JOIN tb_professor ON tb_agendamento.id_professor = tb_professor.id_professor WHERE WEEK(tb_agendamento.data_agendamento, 7) = $semana AND tb_laboratorio.nome_laboratorio = '$laboratorio'");
	while($prod = mysqli_fetch_array($query_agendamento)){

		array_push($arrayLaboratorio, $prod['nome_laboratorio']);
		array_push($arrayProf, $prod['nome_professor']);
		array_push($arrayHoraInicio, $prod['hora_inicio']);
		array_push($arrayHoraFim, $prod['hora_fim']);
		array_push($arrayDataAgendada, $prod['data_agendamento']);
		$tamanhoArray = count($arrayDataAgendada);
			
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../estilos/estilo.css" rel="stylesheet">
	<title>Laboratório</title>
	<?php require '../estilos/bootstrap.php' ?>
	<?php require '../estilos/menu.php' ?>
</head>
<body>
<div class="center">
	
<table class="table">
	<!-- Horários -->
  <!--Laboratórios-->
  <tbody>

    <tr>
      <th> Laboratório </th>
      <th> Professor </th>
      <th> Data Agendada </th>
      <th> Hora início </th>
      <th> Hora Fim </th> 
    </tr>
    <?php for ($i=0; $i < $tamanhoArray ; $i++) { ?>
    	<tr>
    		<td> <?php  echo($arrayLaboratorio[$i]);  ?> </td>
    		<td> <?php  echo($arrayProf[$i]);  ?> </td>
    		<td> <?php  echo date('d/m/Y', strtotime ($arrayDataAgendada[$i])); ?> </td>
    		<td> <?php  echo($arrayHoraInicio[$i]);  ?> h</td>
    		<td> <?php  echo($arrayHoraFim[$i]);  ?> h</td>
    	</tr>
   	<?php }



    ?>
    

  </tbody>
</table>
</div>

</body>
</html>

