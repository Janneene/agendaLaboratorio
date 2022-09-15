<?php
ini_set('display_errors', 1);

$variavel_controle = 0;

$data_agendamento = $_POST['data_agendamento'];
$id_laboratorio = $_POST['labs'];
$id_professor = $_POST['prof'];
$data_hoje = date('Y/m/d');
$hora_inicio = $_POST['hora_inicio'];
$hora_fim = $_POST['hora_fim'];


$data_cria = new DateTime($data_agendamento);
$data_formata = $data_cria->format('Y-m-d');

/*echo ($hora_inicio);
echo ($hora_fim);
echo ($data_hoje."\n");
echo ($data_formata."\n");
echo ($id_laboratorio."\n");
echo ($id_professor."\n");
*/

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

//Verificar colisão de horários

$query = mysqli_query($con, "SELECT * FROM tb_agendamento WHERE ".$id_laboratorio);



while($prod = mysqli_fetch_array($query)){
	$id_lab = $prod['id_laboratorio'];
	$id_prof = $prod['id_professor']; //tá dando erro
	$data_banco = $prod['data_agendamento'];
	$hora_in = $prod['hora_inicio'];
	$hora_f = $prod['hora_fim'];


	if( $id_lab == $id_laboratorio){
		if(strtotime($data_banco) == strtotime($data_formata)){
			if($hora_inicio >= $hora_in && $hora_inicio < $hora_f){
				$variavel_controle = 1;
			
			}elseif($hora_fim > $hora_in && $hora_fim <= $hora_f){
					$variavel_controle = 1;
					//echo "colisao";
			}
			

			
		}
	}
}

if ($variavel_controle == 0){


//Inserir dados na tabela
	$sql = " INSERT INTO tb_agendamento ( data_pedido, data_agendamento, hora_inicio, hora_fim, id_professor, id_laboratorio) VALUES ( '{$data_hoje}', '{$data_formata}', {$hora_inicio},{$hora_fim} ,{$id_professor}, {$id_laboratorio}) ";

	mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../estilos/estilo.css" rel="stylesheet">
	<title>Agendamento</title>
	<?php require '../estilos/bootstrap.php' ?>
	<?php require '../estilos/menu.php' ?>
</head>
<body>
<div class="center">
	<?php
		if ($variavel_controle == 0) {

		 ?>
	<div class="alert alert-success" role="alert">
	
		Seu agendamento foi realizado com sucesso!
  		Confira a tabela de agendamentos em "Home"!
	</div>

  	<?php
  		} 
  		else{ ?>
  			<div class="alert alert-danger" role="alert">
  				Seu agendamento não foi realizado por conta de colisão de horários, por favor verifique a tabela de horários disponíveis em "Home".
			</div>
  		<?php }

  	  ?>

</div>

</body>
</html>

